<?php
# AUTOLOAD = ON
#------------------------------------------------------------
# Lorem ips
#------------------------------------------------------------
#
# Lorem ips
#

abstract class Validator
{
	public static function validate($subject, $input)
	{
		try {
			$call = 'handle' . $subject . 'Validator';
			static::$call($input);
		} catch (Exception $e) {
			self::error($e);
		}
	}

    protected function error(Exception $e) 
    {
        // In future: logging of this, and other settings
        echo '<span style="color: red">Error: ' . $e->getMessage() . '</span>';
        die();
    }
}