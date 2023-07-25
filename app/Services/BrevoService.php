<?php

namespace App\Services;

use Brevo\Client\Api\AccountApi;
use Brevo\Client\Api\EmailCampaignsApi;
use Brevo\Client\Configuration;
use GuzzleHttp\Client;

class BrevoService {

    private $account;
    private string $api_key;
    private mixed $api_instance;
    private Configuration $configuration;

    public function __construct(string $api_key)
    {
        $this->api_key = $api_key;
        $this->authenticate();
    }

    public function authenticate():  void
    {
        $this->configuration = Configuration::getDefaultConfiguration()->setApiKey('api-key', $this->api_key);
        try {
            $this->api_instance = new AccountApi(new Client(), $this->configuration);
            $this->account = $this->api_instance->getAccount();
        }catch(\Exception $exception){
            echo 'Exception when calling AccountApi->getAccount: ', $exception->getMessage(), PHP_EOL;
            exit(1);
        }
    }

    public function getCampaigns(): void
    {
        try {
            $this->api_instance = new EmailCampaignsApi(new Client, $this->configuration);
            $response = $this->api_instance->getEmailCampaigns();
            dd($response);
        }catch(\Exception $exception){
            echo 'Exception when calling EmailCampaignsApi->getEmailCampaigns: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function fetchCampaigns(): void
    {
        try {
           $this->api_instance = new EmailCampaignsApi(new Client, $this->configuration);
           $response = $this->api_instance->getEmailCampaigns();
           dd($response);
        }catch(\Exception $exception){
            echo 'Exception when calling EmailCampaignsApi->getEmailCampaigns: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function findCampaign(int $id)
    {

    }

    public function getCustomers()
    {

    }

}
