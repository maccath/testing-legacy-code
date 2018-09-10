<?php

namespace App;

class PrivateMethod
{
    public function doThat()
    {
        return $this->doThis();
    }

    private function doThis()
    {
        return 'hello';
    }
}