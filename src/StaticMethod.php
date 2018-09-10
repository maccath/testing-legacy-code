<?php

namespace App;

use App\Dependencies\Dependency;

class StaticMethod
{
    public function doSomething()
    {
        return Dependency::doSomethingStatically();
    }
}