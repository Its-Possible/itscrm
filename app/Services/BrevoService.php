<?php

namespace App\Services;

use App\Helpers\Dictionaries\CampaignDictionary;
use Brevo\Client\Api\AccountApi;
use Brevo\Client\Api\EmailCampaignsApi;
use Brevo\Client\Configuration;
use GuzzleHttp\Client;

class BrevoService {

    private $account;
    private string $api_key;
    private mixed $api_instance;
    private Configuration $configuration;

    public function __construct()
    {
        $this->api_key = config('services.brevo.api_key');
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

    public function getCampaigns(): mixed
    {
        try {
            $this->api_instance = new EmailCampaignsApi(new Client, $this->configuration);
            $response = $this->api_instance->getEmailCampaigns();
            return $response['campaigns'];
        }catch(\Exception $exception){
            echo 'Exception when calling EmailCampaignsApi->getEmailCampaigns: ', $exception->getMessage(), PHP_EOL;
        }
    }

    public function countCampaigns(): int
    {
        try {
            $this->api_instance = new EmailCampaignsApi(new Client, $this->configuration);
            $response = $this->api_instance->getEmailCampaigns();

            return $response['count'];

        }catch(\Exception $exception){
            echo 'Exception when calling EmailCampaignsApi->getEmailCampaigns: ', $exception->getMessage(), PHP_EOL;
        }

        return 0;
    }

    public function fetchAllCampaigns() : array
    {
        try {
           $this->api_instance = new EmailCampaignsApi(new Client, $this->configuration);
           $response = $this->api_instance->getEmailCampaigns();

            foreach($response['campaigns'] as $index => $campaign) {

                $campaign_dictionary = new CampaignDictionary();
                foreach(array_keys($campaign) as $property)
                {
                    $campaign_dictionary->$property = $campaign[$property];
                }

                $campaigns_dictionaries[] = $campaign_dictionary;
            }

            return $campaigns_dictionaries;

        }catch(\Exception $exception){
            echo 'Exception when calling EmailCampaignsApi->getEmailCampaigns: ', $exception->getMessage(), PHP_EOL;
        }

        return [];
    }

    public function fetchCampaigns($type = null, $status = null, $statistics = null, $startDate = null, $endDate = null, $limit = '50', $offset = '0', $sort = 'desc', $excludeHtmlContent = null) : array
    {
        try {
            $this->api_instance = new EmailCampaignsApi(new Client, $this->configuration);
            $response = $this->api_instance->getEmailCampaigns($type, $status, $statistics, $startDate, $endDate, $limit, $offset, $sort, $excludeHtmlContent);

            foreach($response['campaigns'] as $index => $campaign) {

                $campaign_dictionary = new CampaignDictionary();
                foreach(array_keys($campaign) as $property)
                {
                    $campaign_dictionary->$property = $campaign[$property];
                }

                $campaigns_dictionaries[] = $campaign_dictionary;
            }

            return $campaigns_dictionaries;

        }catch(\Exception $exception){
            echo 'Exception when calling EmailCampaignsApi->getEmailCampaigns: ', $exception->getMessage(), PHP_EOL;
        }

        return [];
    }

    public function findCampaign(int $id) : object|array
    {
        try {
            $this->api_instance = new EmailCampaignsApi(new Client, $this->configuration);
            $response = $this->api_instance->getEmailCampaign($id);

            foreach($response['campaigns'] as $index => $campaign) {

                $campaign_dictionary = new CampaignDictionary();
                foreach(array_keys($campaign) as $property)
                {
                    $campaign_dictionary->$property = $campaign[$property];
                }
            }

            return $campaign_dictionary;

        }catch(\Exception $exception){
            echo 'Exception when calling EmailCampaignsApi->getEmailCampaigns: ', $exception->getMessage(), PHP_EOL;
        }

        return [];
    }

    public function deleteCampaign(string $code): void
    {
        try {
            $this->api_instance = new EmailCampaignsApi(new Client, $this->configuration);
            $response = $this->api_instance->deleteEmailCampaign((int) getCampaignIdFromCode($code));
        }catch(\Exception $exception){
            echo 'Exception when calling EmailCampaignsApi->getEmailCampaigns: ', $exception->getMessage(), PHP_EOL;
        }
    }
}
