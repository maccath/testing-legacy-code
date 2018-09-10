<?php

namespace Tests;

use App\PrintedOutput;

class PrintedOutputTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Bad test
     */
//    public function testPrintSomeText()
//    {
//        $printedOutput = new PrintedOutput();
//
//        // Prints to test runner, returns null, and can't perform assertions!
//        $printedOutput->printSomeText('Some text');
//    }

    /**
     * Good test!
     */
    public function testPrintSomeText()
    {
        $printedOutput = new PrintedOutput();

        ob_start(); // Start capturing output.

        $printedOutput->printSomeText('Some text');

        $output = ob_get_contents(); // Capture the output.

        ob_end_clean(); // Finish capturing output.

        $this->assertEquals('Some text', $output); // Assert!
    }
}