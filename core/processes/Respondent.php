<?php
# AUTOLOAD = ON
#------------------------------------------------------------
# Respondent
#------------------------------------------------------------
# Lorem
# 
class Respondent extends Singleton
{
	public static function json($data) : string
	{
		$buf = ob_get_clean();
		header('Content-type: application/json');

		echo json_encode($data);
	}
}