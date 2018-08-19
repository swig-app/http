<?php

namespace Swig\Http\Timer;

/**
 * Class Check
 *
 * @package \Swig\Http\Timer
 */
class Check extends \Swig\Http\Base\Check
{
    public function lessThan(int $ms)
    {
        $taken = round(1000 * $this->response()->stats()->getTransferTime());

        return $taken < $ms;
    }

    public function moreThan(int $ms)
    {
        $taken = round(1000 * $this->response()->stats()->getTransferTime());

        return $taken > $ms;
    }
}
