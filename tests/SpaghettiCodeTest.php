<?php

namespace Tests;

use App\SpaghettiCode;
use App\StaticMethod;

/**
 * @runTestsInSeparateProcesses
 */
class SpaghettiCodeTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        \Mockery::close();
    }

    /**
     * Bad test
     */
//    public function testSpaghettiCode()
//    {
//        $spaghettiCode = new SpaghettiCode();
//
//        // Ugh.
//        $spaghettiCode->doLotsOfThings();
//    }

    /**
     * Good test!
     */
    public function testSpaghettiCode()
    {
        $this->expectDependencyReturns('a string');
        $this->expectWordIs('two');
        $this->startCapturingOutput();

        $spaghettiCode = new SpaghettiCode();
        $result = $spaghettiCode->doLotsOfThings();

        // Assert!
        $this->assertOutput('hello two');
        $this->assertEquals('a string', $result);
    }

    private function expectDependencyReturns($string)
    {
        $mockDependency = \Mockery::mock('alias:App\Dependencies\Dependency');
        $mockDependency->shouldReceive('doSomethingStatically')->andReturn($string);
    }

    private function expectWordIs($word)
    {
        $mockDependency = \Mockery::mock('overload:App\Dependencies\Word');
        $mockDependency->shouldReceive('generate')->andReturn($word);
    }

    private function startCapturingOutput()
    {
        ob_start();
    }

    private function assertOutput($actual)
    {
        $output = ob_get_contents();
        ob_end_clean();

        $this->assertEquals($output, $actual);
    }
}