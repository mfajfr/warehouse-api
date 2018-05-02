<?php
/**
 * @author Bc. Marek Fajfr <mfajfr90(at)gmail.com>
 * Created at: 14:12 02.05.2018
 */

namespace models;

use GuzzleHttp\Client;

class WarehouseAPI
{
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $auth;

    /**
     * WarehouseAPI constructor.
     * @param string $url
     * @param string $key
     */
    public function __construct(string $url, $auth)
    {
        $this->url = $url . '/api/v1/';
        $this->auth = $auth;
    }

    public function sendItemTransaction(ItemTransaction $itemTransaction)
    {
        $client = new Client();

        $response = $client->post($this->url . 'item-transaction/store', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->auth,
                'Accept' => 'application/json'
            ],
            'json' => $itemTransaction->jsonSerialize()
        ]);

        return $response;
    }
}