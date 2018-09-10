<?php

namespace App;

use App\Dependencies\Dependency;
use App\Dependencies\Word;

class SpaghettiCode
{
    public function doLotsOfThings()
    {
        $variableOne = 'hello';

        $wordDependency = new Word();

        $string = $variableOne . ' ' . $wordDependency->generate();

        $result = Dependency::doSomethingStatically();

        echo $string;

        return $result;
    }
}