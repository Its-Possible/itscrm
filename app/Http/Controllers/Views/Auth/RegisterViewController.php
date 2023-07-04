<?php

namespace App\Http\Controllers\Views\Auth;

use App\Helpers\Interfaces\ActivationAccountInterface;
use App\Helpers\Interfaces\UserInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\ActivationAccountRepository;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class RegisterViewController extends Controller
{

    private ActivationAccountRepository $activationAccountRepository;

    public function __construct(ActivationAccountRepository $activationAccountRepository)
    {
        $this->activationAccountRepository = $activationAccountRepository;
    }

    //
    public function activateAccount(Request $request, $token)
    {
        $activation_account = $this->activationAccountRepository->WhereTokenIs($token);

        if($activation_account->status !== ActivationAccountInterface::STATUS_ACTIVE) {
            return redirect()->route('its.auth.sign-in')->with('error', 'Activation account link is expired.');
        }

        // Activate account and change status to used
        $user = User::find($activation_account->user_id);
        $user->status = UserInterface::STATUS_ACTIVE;
        $user->save();

        // Change status to used
        $activation_account->status = ActivationAccountInterface::STATUS_USED;
        $activation_account->save();

        return redirect()->route('its.auth.sign-in')->with('success', 'Conta ativada com sucesso.');
    }
}
