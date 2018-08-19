<?php

namespace Swig\Http\Concerns;

use Swig\Http\Manager;

trait InteractsWithHttp
{
    public function http()
    {
        return new Manager();
    }
}
