<?php
# AUTOLOAD = ON
#------------------------------------------------------------
# Respondent
#------------------------------------------------------------
# Lorem
# 
class Respondent extends Singleton
{

	private function cleanBuffer() : void
	{
		// Here must be logging
		ob_get_clean();
	}

	private function confirmResponse() : void
	{
		session_start();
		//must be validation of class here
		//print_r(debug_backtrace()[2]['function']); die();
		$_SESSION['rcnfm'] = md5(debug_backtrace()[2]['function']);
	}

	public static function json($data) : array
	{
		self::cleanBuffer();
		self::confirmResponse();
		header('Content-type: application/json');

		echo json_encode($data);

		return ['key' => 'QddOd68'];
	}
}