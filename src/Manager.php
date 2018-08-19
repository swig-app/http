<?php

namespace Swig\Http;

use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;

/**
 * Class Manager
 *
 * @package \Swig\Http
 */
class Manager
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => getenv('BASE_URI'),
        ]);
    }

    public function request($method, $uri = '', array $options = [])
    {
        $stats = null;
        $options = array_merge($options, [
            'on_stats' => function (TransferStats $transferStats) use (&$stats) {
                $stats = $transferStats;
            }
        ]);

        $response = $this->client->request($method, $uri, $options);

        return Response::from($response, $stats);
    }

    public function get($path)
    {
        return $this->request('GET', $path);
    }
}
