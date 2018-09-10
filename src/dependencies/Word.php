<?php

namespace App\Dependencies;

use Faker\Factory;
use Faker\Generator;

class Word
{
    public function generate()
    {
        $faker = Factory::create();

        return $faker->word();
    }
}