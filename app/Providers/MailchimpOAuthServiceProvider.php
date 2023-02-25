<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class MailchimpOAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind('mailchimp-oauth', function () {
           $client = new Client();
            $response = $client->request('POST', 'https://login.mailchimp.com/oauth2/token', [
                'form_params' => [
                    'grant_type' => 'authorization_code',
                    'client_id' => env('MAILCHIMP_CLIENT_ID'),
                    'client_secret' => env('MAILCHIMP_CLIENT_SECRET'),
                    'redirect_uri' => env('MAILCHIMP_REDIRECT_URI'),
                    'code' => env('MAILCHIMP_AUTHORIZATION_CODE'),
                ]
            ]);

            $accessToken = json_decode($response->getBody())->access_token;

            $mailchimp = new \MailchimpMarketing\ApiClient();
            $mailchimp->setConfig([
                'apiKey' => $accessToken,
                'server' => '<dc>',
            ]);

            return $mailchimp;
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
