<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Helpers\Interfaces\SettingInterface;
use Symfony\Component\HttpFoundation\Response;

class SignUpActivated
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $setting = Setting::where('key', SettingInterface::APP_SETTING_SIGN_UP_STATUS_KEY)
            ->first();

        if ($setting->value == SettingInterface::APP_SETTING_SIGN_UP_STATUS_DISABLED) {
            abort(404);
        }

        return $next($request);
    }
}
