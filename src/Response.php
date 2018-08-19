<?php

namespace Swig\Http;

use GuzzleHttp\TransferStats;
use Psr\Http\Message\ResponseInterface;
use Swig\Http\Status\Assert;
use Swig\Http\Status\Check;

/**
 * Class Response
 *
 * @package \Swig\Http
 */
class Response
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $response;

    /**
     * @var \GuzzleHttp\TransferStats
     */
    private $stats;

    /**
     * Response constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \GuzzleHttp\TransferStats           $stats
     */
    public function __construct(ResponseInterface $response, TransferStats $stats)
    {
        $this->response = $response;
        $this->stats = $stats;
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \GuzzleHttp\TransferStats           $stats
     *
     * @return \Swig\Http\Response
     */
    public static function from(ResponseInterface $response, TransferStats $stats)
    {
        return new static($response, $stats);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function original()
    {
        return $this->response;
    }

    /**
     * @return \GuzzleHttp\TransferStats
     */
    public function stats()
    {
        return $this->stats;
    }

    /**
     * @return \Swig\Http\Status\Assert
     */
    public function status()
    {
        return new Assert(new Check($this));
    }

    public function took()
    {
        return new \Swig\Http\Timer\Assert(new \Swig\Http\Timer\Check($this));
    }


}
