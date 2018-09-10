<?php

namespace Tests;

use App\PrivateMethod;

class PrivateMethodTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        \Mockery::close();
    }

    /**
     * Bad test
     */
//    public function testPrivateMethod()
//    {
//        $privateMethod = new PrivateMethod();
//
//        // Er, we can't.
//        $privateMethod->doThis();
//    }

    /**
     * Good test!
     */
    public function testPrivateMethod()
    {
        $privateMethod = new PrivateMethod();

        // Call calling method.
        $result = $privateMethod->doThat();

        // Assert!
        $this->assertEquals('hello', $result);
    }
}