<?php

namespace Swig\Http\Test\Unit\Status;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Swig\Http\Status\Assert;
use Swig\Http\Status\Check;

class AssertTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_verify_a_status_is_informational()
    {
        $check = new Check(new Response(100));
        $assert = new Assert($check);

        $assert->assertInformational();
    }

    /**
     * @test
     */
    public function it_can_verify_a_status_is_successful()
    {
        $check = new Check(new Response(200));
        $assert = new Assert($check);

        $assert->assertSuccessful();
    }

    /**
     * @test
     */
    public function it_can_verify_a_status_is_redirection()
    {
        $check = new Check(new Response(300));
        $assert = new Assert($check);

        $assert->assertRedirection();
    }

    /**
     * @test
     */
    public function it_can_verify_a_status_is_client_error()
    {
        $check = new Check(new Response(400));
        $assert = new Assert($check);

        $assert->assertClientError();
    }

    /**
     * @test
     */
    public function it_can_verify_a_status_is_server_error()
    {
        $check = new Check(new Response(500));
        $assert = new Assert($check);

        $assert->assertServerError();
    }
}
