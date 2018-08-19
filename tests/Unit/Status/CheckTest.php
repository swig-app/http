<?php

namespace Swig\Http\Test\Unit\Status;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\TransferStats;
use PHPUnit\Framework\TestCase;
use Swig\Http\Status\Check;

class CheckTest extends TestCase
{
    public function check(Response $response)
    {
        $stats = new TransferStats(new Request('GET', 'http://example.com'), $response, 0.2);

        return new Check(\Swig\Http\Response::from($response, $stats));
    }

    /**
     * @test
     */
    public function it_can_verify_a_status_code()
    {
        $this->assertTrue($this->check(new Response(200))->is(200));
        $this->assertTrue($this->check(new Response(401))->is(401));
        $this->assertFalse($this->check(new Response(404))->is(200));
    }
    /**
     * @test
     */
    public function it_can_verify_a_status_is_within_a_range()
    {
        $this->assertTrue($this->check(new Response(200))->inRange(200, 299));
        $this->assertTrue($this->check(new Response(299))->inRange(200, 299));
        $this->assertFalse($this->check(new Response(199))->inRange(200, 299));
        $this->assertFalse($this->check(new Response(300))->inRange(200, 299));
    }
    /**
     * @test
     */
    public function it_can_verify_a_status_is_informational()
    {
        $this->assertTrue($this->check(new Response(100))->isInformational());
        $this->assertTrue($this->check(new Response(102))->isInformational());
        $this->assertFalse($this->check(new Response(103))->isInformational());
        $this->assertFalse($this->check(new Response(200))->isInformational());
    }
    /**
     * @test
     */
    public function it_can_verify_a_status_is_success()
    {
        $this->assertTrue($this->check(new Response(200))->isSuccessful());
        $this->assertTrue($this->check(new Response(208))->isSuccessful());
        $this->assertTrue($this->check(new Response(226))->isSuccessful());
        $this->assertFalse($this->check(new Response(209))->isSuccessful());
        $this->assertFalse($this->check(new Response(300))->isSuccessful());
    }
    /**
     * @test
     */
    public function it_can_verify_a_status_is_redirection()
    {
        $this->assertTrue($this->check(new Response(300))->isRedirection());
        $this->assertTrue($this->check(new Response(305))->isRedirection());
        $this->assertTrue($this->check(new Response(308))->isRedirection());
        $this->assertFalse($this->check(new Response(306))->isRedirection());
        $this->assertFalse($this->check(new Response(400))->isRedirection());
    }
    /**
     * @test
     */
    public function it_can_verify_a_status_is_client_error()
    {
        $this->assertTrue($this->check(new Response(400))->isClientError());
        $this->assertTrue($this->check(new Response(418))->isClientError());
        $this->assertTrue($this->check(new Response(421))->isClientError());
        $this->assertTrue($this->check(new Response(431))->isClientError());
        $this->assertTrue($this->check(new Response(444))->isClientError());
        $this->assertTrue($this->check(new Response(451))->isClientError());
        $this->assertTrue($this->check(new Response(499))->isClientError());
        $this->assertFalse($this->check(new Response(419))->isClientError());
        $this->assertFalse($this->check(new Response(425))->isClientError());
        $this->assertFalse($this->check(new Response(430))->isClientError());
        $this->assertFalse($this->check(new Response(432))->isClientError());
        $this->assertFalse($this->check(new Response(443))->isClientError());
        $this->assertFalse($this->check(new Response(452))->isClientError());
        $this->assertFalse($this->check(new Response(498))->isClientError());
        $this->assertFalse($this->check(new Response(500))->isClientError());
    }
    /**
     * @test
     */
    public function it_can_verify_a_status_is_server_error()
    {
        $this->assertTrue($this->check(new Response(500))->isServerError());
        $this->assertTrue($this->check(new Response(508))->isServerError());
        $this->assertTrue($this->check(new Response(510))->isServerError());
        $this->assertTrue($this->check(new Response(599))->isServerError());
        $this->assertFalse($this->check(new Response(509))->isServerError());
        $this->assertFalse($this->check(new Response(512))->isServerError());
        $this->assertFalse($this->check(new Response(598))->isServerError());
        $this->assertFalse($this->check(new Response(600))->isServerError());
    }

}
