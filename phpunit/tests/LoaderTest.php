<?php
require_once 'MVExtension.php';

use PHPUnit\Framework\TestCase;

final class LoaderTest extends TestCase
{
    use MVExtension;

    public function setUp() : void
    {
    	$this->classname = 'Loader';
		$this->loader = new $this->classname();
	}

    // public function testClassesLoading()
    // {
    //     $this->assertTrue(class_exists($this->classname));
    // }

    public function testGetExclusions()
    {
        $method = self::getMethod($this->classname, 'getExclusions');
        $response = $method->invokeArgs($this->loader, []);

        $this->assertEquals(3, count($response));
    }

    // public function testHandleFile()
    // {
    // 	$object = new $this->classname();
    // }
}