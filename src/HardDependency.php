<?php

namespace App;

use App\Dependencies\Dependency;

class HardDependency
{
    public function doSomething()
    {
        $dependency = new Dependency();

        return $dependency->doSomething();
    }

    public function doSomethingWithInjectedDependency($dependency)
    {
        return $dependency->doSomething();
    }
}