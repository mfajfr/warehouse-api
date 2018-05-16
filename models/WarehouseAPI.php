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

    public function storeItemTransaction(ItemTransaction $itemTransaction)
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

    public function updateItemTransaction(ItemTransaction $itemTransaction, $item_transaction_uid)
    {
        $client = new Client();

        $response = $client->patch($this->url . 'item-transaction/' . $item_transaction_uid . '/complete', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->auth,
                'Accept' => 'application/json'
            ],
            'json' => $itemTransaction->jsonSerialize()
        ]);

        return $response;
    }

    public function completeItemTransaction($item_transaction_uid)
    {
        $client = new Client();

        $response = $client->patch($this->url . 'item-transaction/' . $item_transaction_uid . '/complete', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->auth,
                'Accept' => 'application/json'
            ]
        ]);

        return $response;
    }

    public function deleteItemTransaction($item_transaction_uid)
    {
        $client = new Client();

        $response = $client->delete($this->url . 'item-transaction/' . $item_transaction_uid . '/delete', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->auth,
                'Accept' => 'application/json'
            ]
        ]);

        return $response;
    }
}