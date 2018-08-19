<?php

namespace Swig\Http\Timer;

use Swig\Http\Base\Assertion;
use PHPUnit\Framework\Assert as PHPUnit;

/**
 * Class Assert
 *
 * @package \Swig\Http\Timer
 */
class Assert extends Assertion
{
    public function assertLessThan($ms)
    {
        PHPUnit::assertTrue(
            $this->check->lessThan($ms),
            'Response took more than '.$ms.'ms.'
        );
    }

    public function assertMoreThan($ms)
    {
        PHPUnit::assertTrue(
            $this->check->moreThan($ms),
            'Response took less than '.$ms.'ms.'
        );
    }
}
