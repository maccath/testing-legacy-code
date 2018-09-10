<?php

namespace App\Dependencies;

class Dependency
{
    public function doSomething()
    {
        throw new \Exception("No!");
    }
}