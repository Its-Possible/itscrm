<?php

namespace App\Services;

use Brevo\Client\Api\AccountApi;
use Brevo\Client\Api\EmailCampaignsApi;
use Brevo\Client\Configuration;
use GuzzleHttp\Client;
use PharIo\Manifest\Email;

class BrevoService
{


    private string $apiKey;
    private mixed $account;
    private mixed $apiInstance;
    private Configuration $configuration;

    public function __construct()
    {
        $this->apiKey = config('services.brevo.key');
        $this->authenticate();
    }

    private function authenticate(): void
    {
        $this->configuration = Configuration::getDefaultConfiguration()->setApiKey('api-key', $this->apiKey);

        try {
            $this->apiInstance = new AccountApi(new Client(), $this->configuration);
            $this->account = $this->apiInstance->getAccount();
        } catch (\Exception $exception) {
            echo 'Exception when calling AccountApi->getAccount: ', $exception->getMessage(), PHP_EOL;
            exit(1);
        }
    }

    public function getAllCampaigns(): mixed
    {
        try {
            $this->apiInstance = new EmailCampaignsApi(new Client(), $this->configuration);
            $response = $this->apiInstance->getEmailCampaigns();
            return $response["campaigns"];
        } catch (\Exception $exception) {
            echo 'Exception when calling EmailCampaignsApi->getEmailCampaigns: ', $exception->getMessage(), PHP_EOL;
        }

        return null;
    }

    public function countAllCampaigns(): mixed
    {
        try {
            $this->apiInstance = new EmailCampaignsApi(new Client(), $this->configuration);
            $response = $this->apiInstance->getEmailCampaign();
            return $response["count"];
        }catch(\Exception $exception) {
            echo 'Exception when calling EmailCampaignsApi->getEmailCampaigns: ', $exception->getMessage(), PHP_EOL;
        }

        return 0;
    }
}
