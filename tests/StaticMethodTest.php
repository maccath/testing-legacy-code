<?php

namespace Tests;

use App\StaticMethod;

/**
 * @runInSeparateProcess
 * @preserveGlobalState false
 */
class StaticMethodTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        \Mockery::close();
    }

    /**
     * Bad test
     */
//    public function testStaticMethod()
//    {
//        $staticMethod = new StaticMethod();
//
//        // Throws an exception, always!
//        $staticMethod->doSomething();
//    }

    /**
     * Good test!
     */
    public function testStaticMethod()
    {
        // Alias the hard dependency.
        $mockDependency = \Mockery::mock('alias:App\Dependencies\Dependency');

        // Mock the ‘doSomethingStatically’ method.
        $mockDependency->shouldReceive('doSomethingStatically')->andReturn('a result');

        $staticMethod = new StaticMethod();

        $result = $staticMethod->doSomething();

        // Assert!
        $this->assertEquals('a result', $result);
    }
}