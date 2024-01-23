<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\Interfaces\UserInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class SignInApiController extends Controller
{
    //
    public int $attemptsLimit = 5;

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|min:4|max:100',
            'password' => 'required|string|min:4|max:100',
            'remember' => 'nullable|boolean',
        ]);

        if(RateLimiter::tooManyAttempts(request()->ip(), $this->attemptsLimit)) {
            return back()->withInput()->withErrors(['credentials' => 'Demasiadas tentativas, o seu IP esta restrigido por 1 minuto.']);
        }

        if ($validated) {
            if (filter_var($request->input('username'), FILTER_VALIDATE_EMAIL)) {
                $credentials = [
                    'email' => $request->input('username'),
                    'password' => $request->input('password'),
                ];
            } else {
                $credentials = [
                    'username' => $request->input('username'),
                    'password' => $request->input('password'),
                ];
            }

            if (Auth::attemptWhen($credentials, function ($user) {
                return $user->status === UserInterface::STATUS_ACTIVE;
            })) {
                session()->regenerate();

                if (auth()->user()->status === UserInterface::STATUS_ACTIVE) {
                    RateLimiter::clear(request()->ip());
                    return (session()->has('url.intended')) ? redirect(session()->get('url.intended')) : redirect()->route('its.app.home');
                }

                return redirect()->route('its.auth.sign-in')->withErrors(['account' => 'A sua conta não esta ativa.']);
            }

            $user = User::where('username', $request->input('username'))
                ->orWhere('email', $request->input('username'));

            if ($user->count() > 0) {
                switch ($user->first()->status) {
                    case UserInterface::STATUS_PENDING:
                        return back()->withInput()->withErrors(['status' => 'A sua conta não está ativa, o adminstrador não aprovou a sua conta!.']);
                    case UserInterface::STATUS_BANNED:
                        return back()->withInput()->withErrors(['status' => 'A sua conta foi banida. Contate o administrador.']);
                    case UserInterface::STATUS_SUSPENDED:
                        return back()->withInput()->withErrors(['status' => 'A sua conta foi suspensa. Contate o administrador.']);
                    case UserInterface::STATUS_EXPIRED:
                        return back()->withInput()->withErrors(['status' => 'A sua conta expirou. Contate o administrador.']);
                }
            }
        }

        RateLimiter::hit(request()->ip(), 60);

        return back()->withInput()->withErrors(['credentials' => 'As credenciais introduzidas são inválidas, tente novamente!.']);
    }
}
