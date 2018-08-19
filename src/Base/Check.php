<?php

namespace Swig\Http\Base;

use Psr\Http\Message\ResponseInterface;
use Swig\Http\Response;

/**
 * Class Base
 *
 * @package \Swig\Http\Checks
 */
abstract class Check
{
    /**
     * @var \Swig\Http\Response $response
     */
    protected $response;

    /**
     * Base constructor.
     *
     * @param \Swig\Http\Response $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return \Swig\Http\Response $response
     */
    public function response()
    {
        return $this->response;
    }
}
