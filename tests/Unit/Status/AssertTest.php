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
}
