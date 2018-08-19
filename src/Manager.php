<?php

namespace Swig\Http;

use GuzzleHttp\Client;

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

    public function get($path)
    {
        $response = $this->client->get($path);

        return Response::from($response);
    }
}
