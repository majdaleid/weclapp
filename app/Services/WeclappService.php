<?php

namespace App\Services;

use GuzzleHttp\Client;

class WeclappService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('WECLAPP_BASE_URL'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'AuthenticationToken' => env('WECLAPP_API_TOKEN'),
            ]
        ]);
        // another way to authenticate

        /* $this->client = new Client([
            'base_uri' => env('WECLAPP_BASE_URL'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'auth' => ['*', env('WECLAPP_API_TOKEN')],
        ]);*/
    }


    public function getContract($entityId)
    {
        $response = $this->client->get("/webapp/api/v1/contract/id/$entityId");
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateContract($entityId, $data)
    {
        $response = $this->client->put("/webapp/api/v1/contract/id/$entityId", [
            'json' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
