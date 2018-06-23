<?php
/**
 * @author Bc. Marek Fajfr <mfajfr90(at)gmail.com>
 * Created at: 18:57 23.06.2018
 */

namespace WarehouseApi;

use GuzzleHttp\Client;

class ItemTransactionAPI extends WarehouseAPI
{
    public function store(ItemTransaction $itemTransaction)
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

    public function update(ItemTransaction $itemTransaction, $item_transaction_uid)
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

    public function complete($item_transaction_uid)
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

    public function delete($item_transaction_uid)
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