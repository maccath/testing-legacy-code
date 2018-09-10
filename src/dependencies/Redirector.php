<?php

namespace App\Dependencies;

class Redirector
{
    public function redirect($url)
    {
        header("Location: $url");
    }
}