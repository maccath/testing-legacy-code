<?php

namespace App\Dependencies;

class Dependency
{
    public function doSomething()
    {
        throw new \Exception("No!");
    }

    public static function doSomethingStatically()
    {
        throw new \Exception("No way!");
    }
}