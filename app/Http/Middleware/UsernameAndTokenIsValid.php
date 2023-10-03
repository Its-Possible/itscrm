<?php

namespace App\Http\Middleware;

use App\Models\PersonalAccessToken;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsernameAndTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = User::where('username', $request->headers->get('clientid'))->firstOrFail();

        $token = PersonalAccessToken::where('token', $request->headers->get('clientsecret'))
            ->where('name', $request->headers->get('appid'))
            ->firstOrFail();

        if(!$token->tokenable_id === $user->id) {
            abort(404);
        }

        return $next($request);
    }
}
