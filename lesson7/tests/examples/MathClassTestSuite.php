<?php

require_once 'MathClassTest.php';
require_once 'MathClassProviderTest.php';
class MySuite extends PHPUnit_Framework_TestSuite
{
    protected $sharedFixture;

    public static function suite()
    {
        $suite = new MySuite ('MyTestSuite');
        $suite->addTestSuite('MathClassTest');
        $suite->addTestSuite('MathClassProviderTest');
        return $suite;
    }
    protected function setUp()
    {
        $this->sharedFixture = new MathClass();
    }
    protected function tearDown()
    {
        $this->sharedFixture = NULL;
    }
}