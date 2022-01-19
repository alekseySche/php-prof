<?php

require_once 'MathClass.php';
class MathClassTest extends PHPUnit_Framework_TestCase
{
    public function testFactorial()
    {
        $my = new MathClass ();
        $this->assertEquals(6, $my->factorial(3));
    }
}