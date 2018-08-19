<?php

namespace Swig\Http\Status;

use Swig\Http\Base\Assertion;
use PHPUnit\Framework\Assert as PHPUnit;

/**
 * Class Assert
 *
 * @package \Swig\Http\Status
 */
class Assert extends Assertion
{
    public function assertInformational()
    {
        PHPUnit::assertTrue(
            $this->check->isInformational(),
            'Response status code ['.$this->check->response()->getStatusCode().'] is not a informational status code.'
        );
    }

    public function assertSuccessful()
    {
        PHPUnit::assertTrue(
            $this->check->isSuccessful(),
            'Response status code ['.$this->check->response()->getStatusCode().'] is not a successful status code.'
        );
    }

    public function assertOk()
    {
        PHPUnit::assertTrue(
            $this->check->isOk(),
            'Response status code ['.$this->check->response()->getStatusCode().'] does not match expected 200 status code.'
        );
    }

    public function assertNotFound()
    {
        PHPUnit::assertTrue(
            $this->check->isNotFound(),
            'Response status code ['.$this->check->response()->getStatusCode().'] is not a not found status code.'
        );
    }

    public function assertForbidden()
    {
        PHPUnit::assertTrue(
            $this->check->isForbidden(),
            'Response status code ['.$this->check->response()->getStatusCode().'] is not a forbidden status code.'
        );
    }

    public function assertStatus($status)
    {
        $actual = $this->check->response()->getStatusCode();

        PHPUnit::assertTrue(
            $this->check->is($status),
            "Expected status code {$status} but received {$actual}."
        );
    }
}
