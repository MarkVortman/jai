<?php

class RouterValidator extends Validator
{
	public static function validate($arr)
	{
		try {
			self::handle($arr);
		} catch (Exception $e) {
			echo $e->getMessage() . "\n";
		}
	}

	protected function handle($input) 
	{
		if (count($input) != 2)
			throw new Exception('Route not valid');

		var_dump($input);
	}
}