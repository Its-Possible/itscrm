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
            return new \App\Services\BrevoService();
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
