<?php

namespace Tests;

use App\Dependencies\Redirector;
use App\ExitProperly;

class ExitProperlyTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        \Mockery::close();
    }

    /**
     * Bad test!
     */
//    public function testExitProperly()
//    {
//        $exitProperly = new ExitProperly();
//
//        // Can't redirect in test runner...
//        $exitProperly->catchErrorAndRedirect(new Redirector());
//    }

    /**
     * Good test - bad code!
     */
    public function testDoesntExitProperly()
    {
        $exitProperly = new ExitProperly();

        // Mock the ‘redirector’ method.
        $mockRedirector = \Mockery::mock(Redirector::class);

        // Don't redirect.
        $mockRedirector->shouldReceive('redirect');

        ob_start();
        $exitProperly->catchErrorAndRedirectButDontExit($mockRedirector);
        $result = ob_get_contents();
        ob_end_clean();

        // Assert!
        $this->assertEquals('Unexpected behaviour!', $result);
    }

    /**
     * Good test - good code!
     */
    public function testExitProperly()
    {
        $exitProperly = new ExitProperly();

        // Mock the ‘redirector’ method.
        $mockRedirector = \Mockery::mock(Redirector::class);

        // Don't redirect.
        $mockRedirector->shouldReceive('redirect');

        ob_start();
        $exitProperly->catchErrorAndRedirect($mockRedirector);
        $result = ob_get_contents();
        ob_end_clean();

        // Assert!
        $this->assertEquals('', $result);
    }
}