<?php

namespace App\Http\Controllers\Views\Auth;

use App\Helpers\Interfaces\ActivationAccountInterface;
use App\Helpers\Interfaces\UserInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\ActivationAccountRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laminas\Diactoros\Response\JsonResponse;

class SignUpViewController extends Controller
{
    //
    private ActivationAccountRepository $activationAccountRepository;

    public function __construct(ActivationAccountRepository $activationAccountRepository)
    {
        $this->activationAccountRepository = $activationAccountRepository;
    }

    public function register(): View|Factory|Application
    {
        return view('pages.auth.sign-up');
    }

    public function activationAccount(Request $request, $token): RedirectResponse
    {
        $activation_account = $this->activationAccountRepository->WhereTokenIs($token);

        if($activation_account->status !== ActivationAccountInterface::STATUS_ACTIVE) {
            return redirect()->route('auth.sign-in')->with('error', 'Activation account link is expired.');
        }

        // Activate account and change status to used
        $user = User::find($activation_account->user_id);
        $user->status = UserInterface::STATUS_ACTIVE;
        $user->save();

        // Change status to used
        $activation_account->status = ActivationAccountInterface::STATUS_USED;
        $activation_account->save();

        return redirect()->route('auth.sign-in')->with('success', 'Conta ativada com sucesso.');
    }
}
