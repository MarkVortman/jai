<?php
# AUTOLOAD = ON
#------------------------------------------------------------
# Warden
#------------------------------------------------------------
# Lorem ips
#

class Warden extends Singleton
{
	private function cleanBuffer() : void
	{
		// Here must be logging
		ob_get_clean();
	}

	public static function die($data) : void
	{
		self::cleanBuffer();
		self::output(self::collect($data));

		die(1);
	}

	public static function lastPoint($data) : void
	{
		self::cleanBuffer();
		if(empty($GLOBALS['warden']))
			$GLOBALS['warden'] = [];
		array_push($GLOBALS['warden'], self::collect($data));
		foreach ($GLOBALS['warden'] as $value) 
			self::output($value);

		die(1);
	}

	public static function point($data) : void
	{
		if(empty($GLOBALS['warden']))
			$GLOBALS['warden'] = [];
		array_push($GLOBALS['warden'], self::collect($data));
	}

	private function collect($data) : string
	{
		$method = 'handle' . ucfirst(gettype($data));

		return self::$method($data);
	}

	private function output($string) : void
	{
		echo '<pre>' . $string . '</pre>';
	}

	private function handleBoolean(bool $bool) : string
	{
		return (string)$bool;
	}

	private function handleInteger(int $integer) : string
	{
		return (string)$integer;
	}

	private function handleDouble(float $double) : string
	{
		return (string)$double;
	}

	private function handleString(string $string) : string
	{
		return (string)$string;
	}

	private function handleArray(array $array) : string
	{
		return (string)var_export($array, true);
	}

	private function handleObject(object $object) : string
	{
		return (string)var_export($object, true);
	}

	private function handleResource($resource) : string
	{
		return "We can't handle resource";
	}

	private function handleNULL($NULL) : string
	{
		return "NULL";
	}
}