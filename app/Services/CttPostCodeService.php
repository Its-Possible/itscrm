<?php

namespace App\Services;

use Http;
use Log;

class CttPostCodeService {

    private string $apikey;
    private string $baseUrl;
    private string $postcode;

    public function __construct()
    {
        $this->apikey = config('services.ctt_postcodes.key');
        $this->baseUrl = config('services.ctt_postcodes.url');
    }

    public function postcode(string $postcode): static
    {
        $this->postcode = $postcode;
        return $this;
    }

    /**
     * @param string $postcode Postcode to get information about location
     * @return void
     */
    public function infoLocation(): string
    {
        $response = Http::get("{$this->baseUrl}/{$this->apikey}/{$this->postcode}");

        if($response->status() == 200){
            return $response->body();
        }else{
            Log::error("CTT Código Postal Error | Status: {$response->status()} | Message: {$response->reason()}");
            return "CTT Código Postal Error | Status: {$response->status()} | Message: {$response->reason()}";
        }
    }

}
