<?php

namespace Tests;

use App\Dependencies\Dependency;
use App\HardDependency;

class HardDependencyTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        \Mockery::close();
    }

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
     * Good test - bad code!
     *
     * @runInSeparateProcess
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

    /**
     * Good test - good code!
     *
     * @runInSeparateProcess
     */
    public function testInjectedDependency()
    {
        // Mock the injected dependency.
        $mockDependency = \Mockery::mock(Dependency::class);

        // Mock the ‘doSomething’ method.
        $mockDependency->shouldReceive('doSomething')->andReturn('a result');

        $hardDependency = new HardDependency();

        $result = $hardDependency->doSomethingWithInjectedDependency($mockDependency);

        // Assert!
        $this->assertEquals('a result', $result);
    }
}