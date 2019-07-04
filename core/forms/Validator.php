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
        
        switch (AM) {
            case 'dev':
                exit(json_encode('dev mode'));
                break;
            case 'prod':
                $message = [
                    'message' => $e->getMessage(),
                    'target'    => $e->getTrace(),
                ];
                exit(json_encode($message));
                break;
            case 'debug':
                exit(json_encode('debug mode'));
                break;
            default:
                exit(json_encode('excce'));
                break;
        }


    }

    protected function generateException(string $message, int $code) : void
    {
    	throw new Exception(static::class . " : " . $message, $code);
    }
}