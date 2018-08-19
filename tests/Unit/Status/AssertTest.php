<?php

namespace Swig\Http\Test\Unit\Status;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\TransferStats;
use PHPUnit\Framework\TestCase;
use Swig\Http\Status\Assert;
use Swig\Http\Status\Check;

class AssertTest extends TestCase
{
    public function assert(Response $response)
    {
        $stats = new TransferStats(new Request('GET', 'http://example.com'), $response, 0.2);

        $check = new Check(\Swig\Http\Response::from($response, $stats));

        return new Assert($check);
    }

    /**
     * @test
     */
    public function it_can_verify_a_status_is_informational()
    {
        $response = new Response(100);
        $assert = $this->assert($response);

        $assert->assertInformational();
    }

    /**
     * @test
     */
    public function it_can_verify_a_status_is_successful()
    {
        $response = new Response(200);
        $assert = $this->assert($response);

        $assert->assertSuccessful();
    }

    /**
     * @test
     */
    public function it_can_verify_a_status_is_redirection()
    {
        $response = new Response(300);
        $assert = $this->assert($response);

        $assert->assertRedirection();
    }

    /**
     * @test
     */
    public function it_can_verify_a_status_is_client_error()
    {
        $response = new Response(400);
        $assert = $this->assert($response);

        $assert->assertClientError();
    }

    /**
     * @test
     */
    public function it_can_verify_a_status_is_server_error()
    {
        $response = new Response(500);
        $assert = $this->assert($response);

        $assert->assertServerError();
    }

    /**
     * @test
     */
    public function it_can_verify_if_a_status_is_200_ok()
    {
        $response = new Response(200);
        $assert = $this->assert($response);

        $assert->assertOk();
    }

    /**
     * @test
     */
    public function it_can_verify_if_a_status_is_404_not_found()
    {
        $response = new Response(404);
        $assert = $this->assert($response);

        $assert->assertNotFound();
    }

    /**
     * @test
     */
    public function it_can_verify_if_a_status_is_403_forbidden()
    {
        $response = new Response(403);
        $assert = $this->assert($response);

        $assert->assertForbidden();
    }

    /**
     * @test
     */
    public function it_can_verify_if_a_status_is_401_unauthorized()
    {
        $response = new Response(401);
        $assert = $this->assert($response);

        $assert->assertUnauthorized();
    }

    /**
     * @test
     */
    public function it_can_verify_any_status()
    {
        $response = new Response(204);
        $assert = $this->assert($response);

        $assert->assertStatus(204);
    }
}
