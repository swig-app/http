<?php

namespace Swig\Http;

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
     * Response constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return \Swig\Http\Response
     */
    public static function from(ResponseInterface $response)
    {
        return new static($response);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function original()
    {
        return $this->response;
    }

    /**
     * @return \Swig\Http\Status\Assert
     */
    public function status()
    {
        return new Assert(new Check($this->response));
    }
}
