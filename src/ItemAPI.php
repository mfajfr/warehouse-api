<?php
/**
 * @author Bc. Marek Fajfr <mfajfr90(at)gmail.com>
 * Created at: 18:55 23.06.2018
 */

namespace WarehouseApi;

use GuzzleHttp\Client;

class ItemAPI extends WarehouseAPI
{
    public function stocked($item_uid)
    {
        $client = new Client();

        $response = $client->get($this->url . 'item/' . $item_uid . '/stocked', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->auth,
                'Accept' => 'application/json'
            ]
        ]);

        return $response;
    }

    public function stockedList()
    {
        $client = new Client();

        $response = $client->get($this->url . 'item/stocked-list', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->auth,
                'Accept' => 'application/json'
            ]
        ]);

        return $response;
    }

    public function providers($item_uid)
    {
        $client = new Client();

        $response = $client->get($this->url . 'item/' . $item_uid . '/stocked', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->auth,
                'Accept' => 'application/json'
            ]
        ]);

        return $response;
    }
}