<?php

namespace Tests;

use App\HardDependency;

class HardDependencyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Bad test
     */
//    public function testHardDependency()
//    {
//        $hardDependency = new HardDependency();
//
//        // Throws an exception, always!
//        $hardDependency->doSomething();
//    }

    /**
     * Good test!
     */
    public function testHardDependency()
    {
        // Overload the hard dependency.
        $mockDependency = \Mockery::mock('overload:App\Dependencies\Dependency');

        // Mock the ‘doSomething’ method.
        $mockDependency->shouldReceive('doSomething')->andReturn('a result');

        $hardDependency = new HardDependency();

        $result = $hardDependency->doSomething();

        // Assert!
        $this->assertEquals('a result', $result);
    }
}