<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService {

    private Client $client;

    private string $client_id;
    private string $client_token;

    public function __construct()
    {
        $this->client_id = env('TWILIO_CLIENT_ID');
        $this->client_token = env('TWILIO_CLIENT_TOKEN');

        $this->client = new Client($this->client_id, $this->client_token);
    }

    /**
     * @param string $to
     * @param string $message
     * @return void
     */
    public function sms(string $to, string $message): void
    {
        $mobile_number = env('TWILIO_MOBILE_PHONE');

        $this->client->messages->create($to, [
            'From' => $mobile_number,
            'body' => 'Hello world!'
        ]);
    }
}
