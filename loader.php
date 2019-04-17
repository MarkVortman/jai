<?php
#------------------------------------------------------------
# Just load classes
#------------------------------------------------------------

class Loader
{

	public static function init(string $unit)
	{	
		return realpath($unit);
		try {
			self::handleFolder(realpath($unit) . '/', self::getExclusions());
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	protected function handleFolder(string $absolutePath, $exclusions)
	{
		$allFiles = scandir($absolutePath);

		foreach ($allFiles as $key => $fileName) {
			foreach ($exclusions as $key => $excName) {
				if ( $excName == $fileName ) 
					continue 2;
			}

			if (is_dir($absolutePath . $fileName))
				self::handleFolder($absolutePath . $fileName . '/', $exclusions);
			elseif (is_file($absolutePath . $fileName))
				self::handleFile($absolutePath . $fileName);
			else
				throw new Exception("Can't handle PHP classes before autoloading, problem with: $fileName");
		}
	}

	protected function handleFile(string $filePath)
	{
		if (pathinfo($filePath, PATHINFO_EXTENSION) != 'php')
			return;
		if( is_readable($filePath)){
			$var = file($filePath)[1];
			$arr = explode('=', $var);
			$key = trim($arr[0], '# ');
			$value = trim($arr[1]);
			if ($key === 'AUTOLOAD' && $value === 'ON') {
				require_once $filePath;
			}
		} else {
			throw new Exception("Incorrect permissions, cant read file: $filePath");
		}
	}

	protected function getExclusions()
	{
		return array(".", "..", basename(__FILE__));
	}
}