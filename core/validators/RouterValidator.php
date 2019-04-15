<?php
# AUTOLOAD = ON
#------------------------------------------------------------
# Router validator
#------------------------------------------------------------
#
# This class responsible for conformity parameters to 
# template. App need strictly declared type of parameters. In
# our case - only latin letters and numbers.
#

class RouterValidator extends Validator
{
	#------------------------------------------------------------
	# Route format validation
	#------------------------------------------------------------

	protected function handleFormatValidator($input) 
	{
		if (count($input) != 2)
			throw new Exception("Route not valid: must be double immersion.");
		if (!preg_match("/^[A-Za-z0-9]+$/", $input[0] . $input[1])) 
			throw new Exception("Route not valid: parameters has unsupported characters.");
	}

	#------------------------------------------------------------
	# Physical file validation
	#------------------------------------------------------------

	protected function handlePhysicalValidator($input) 
	{
		if (!file_exists($input['controller']))
			throw new Exception("Controller " . $input['controller'] . " doesn't exist.");
		if (!is_readable($input['controller']))
			throw new Exception("Wrong permisson of " . $input['controller'] . ". Can't read file.");
	}

	#------------------------------------------------------------
	# Class settings validation
	#------------------------------------------------------------

	protected function handleClassValidator($input) 
	{
		if (!class_exists($input['class']))
			throw new Exception("Class " . $input['class'] . " doesn't exist.");
		if (!method_exists($input['class'], $input['method']))
			throw new Exception("Method " . $input['method'] . " doesn't exist.");
	}

	#------------------------------------------------------------
	# Method validation
	#------------------------------------------------------------

	protected function handleMethodValidator($input) 
	{
        if (!($input['key'] == 'METHOD' && strtoupper($input['value']) == $_SERVER['REQUEST_METHOD']))
            throw new Exception("Unsupported request method.");
	}
}