<?php

require_once 'MathClass.php';
class MathClassProviderTest extends PHPUnit_Framework_TestCase
{
    public function testFactorial($a, $b)
    {
        $my = new MathClass ();
        $this->assertEquals($b, $my->factorial($a));
    }

    public function providerFactorial()
    {
        return array(
            array(0, 1),
            array(2, 2),
            array(5, 120)
        );
    }
}