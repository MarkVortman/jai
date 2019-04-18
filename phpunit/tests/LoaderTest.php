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

	public function tearDown() : void
	{
		$this->classname = null;
		$this->loader = null;
	}

    public function testGetExclusions() : void
    {
        $method = self::getMethod($this->classname, 'getExclusions');
        $response = $method->invokeArgs($this->loader, []);
        $comp = count($response);

        $this->assertEquals(3, $comp);
    }

    // public function testHandleFile()
    // {
    // 	$object = new $this->classname();
    // }
}