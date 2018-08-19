<?php

namespace Swig\Http\Base;

use Psr\Http\Message\ResponseInterface;

/**
 * Class Base
 *
 * @package \Swig\Http\Checks
 */
abstract class Check
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $response;

    /**
     * Base constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function response()
    {
        return $this->response;
    }


}
