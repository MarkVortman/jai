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

    public function testHandleFile() : void
    {
        $path = AD . 'phpunit/mock/Mock.php';
        $mock = fopen($path, 'w+');
        fwrite($mock, "<?php\n#AUTOLOAD=ON\n class Mock {}");
        $method = self::getMethod($this->classname, 'handleFile');
        $method->invokeArgs($this->loader, [$path]);
        $response = class_exists('Mock');
        unlink($path);
        
        $this->assertTrue($response);
        
    }
}