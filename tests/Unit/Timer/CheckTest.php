<?php

namespace Swig\Http\Test\Unit\Timer;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\TransferStats;
use PHPUnit\Framework\TestCase;
use Swig\Http\Timer\Check;

class CheckTest extends TestCase
{
    public function check(Response $response)
    {
        $stats = new TransferStats(new Request('GET', 'http://example.com'), $response, 0.3);

        return new Check(\Swig\Http\Response::from($response, $stats));
    }

    /**
    * @test
    */
    public function it_can_verify_if_it_took_less_than_x()
    {
        $this->assertTrue($this->check(new Response(200))->lessThan(301));
    }

    /**
    * @test
    */
    public function it_can_verify_if_it_took_more_than_x()
    {
        $this->assertTrue($this->check(new Response(200))->moreThan(299));
    }
}
