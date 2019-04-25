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
	public static function validate($subject, $input) : void
	{
		try {
			$call = 'handle' . $subject . 'Validator';
			static::$call($input);
		} catch (Exception $e) {
			self::error($e);
		}
	}

    protected function error(Exception $e) : void
    {
        // In future: logging of this, and other settings
        ob_get_clean();
        http_response_code($e->getCode());
        header('Content-type: application/json');
        $message = [
        	'message' => $e->getMessage()
    	];
        exit(json_encode($message));
    }

    protected function generateException(string $message, int $code) : void
    {
    	throw new Exception(static::class . " : " . $message, $code);
    }
}