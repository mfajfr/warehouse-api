<?php
/**
 * @author Bc. Marek Fajfr <mfajfr90(at)gmail.com>
 * Created at: 14:12 02.05.2018
 */

namespace WarehouseAPI;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class WarehouseV1API
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
     * WarehouseV1API constructor.
     * @param string $url
     * @param string $auth
     */
    public function __construct(string $url, $auth)
    {
        $this->url = $url . '/api/v1/';
        $this->auth = $auth;
    }

    protected function client()
    {
        return new Client([
            'base_uri' => $this->url,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->auth,
                'Accept' => 'application/json'
            ]
        ]);
    }

    public function get($uri)
    {
        return $this->client()->get($uri);
    }

    public function post($uri, $data)
    {
        return $this->client()->post($uri, [
            'json' => $data
        ]);
    }

    public function put($uri, $data)
    {
        return $this->client()->post($uri, [
            'json' => $data
        ]);
    }

    public function delete($uri)
    {
        return $this->client()->delete($uri);
    }

    public function response(ResponseInterface $response, $onlyData = true)
    {
        if ($onlyData) {
            return json_decode($response->getBody()->getContents());
        } else {
            return $response;
        }
    }
}