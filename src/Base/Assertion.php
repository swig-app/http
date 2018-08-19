<?php

namespace Swig\Http\Base;

/**
 * Class Assertion
 *
 * @package \Swig\Http\Base
 */
abstract class Assertion
{
    /**
     * @var \Swig\Http\Base\Check
     */
    protected $check;

    public function __construct(Check $check)
    {
        $this->check = $check;
    }
}
