<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PHPUnit\TextUI\Application;

class BrevoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(\App\Services\BrevoService::class, function ($app) {
            return new \App\Services\BrevoService(
                api_key: config('mail.brevo.api_key')
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
