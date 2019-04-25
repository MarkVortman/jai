<?php
# AUTOLOAD = ON
#------------------------------------------------------------
# Router validator
#------------------------------------------------------------
#
# This class responsible for conformity parameters to 
# template. App need strictly declared type of parameters. In
# our case - only latin letters and numbersm, it's one of more
# requires to query.
#

class RouterValidator extends Validator
{
	#------------------------------------------------------------
	# Route format validation
	#------------------------------------------------------------

	protected function handleFormatValidator($input) : void
	{
		if (count($input) != 2)
			parent::generateException("Route not valid: must be double immersion.", 400);
		if (!preg_match("/^[A-Za-z0-9]+$/", $input[0] . $input[1])) 
			parent::generateException("Route not valid: parameters has unsupported characters.", 400);
	}

	#------------------------------------------------------------
	# Physical file validation
	#------------------------------------------------------------

	protected function handlePhysicalValidator($input) : void
	{
		if (!file_exists($input['controller']))
			parent::generateException("Controller " . $input['controller'] . " doesn't exist.", 400);
		if (!is_readable($input['controller']))
			parent::generateException("Wrong permisson of " . $input['controller'] . ". Can't read file.", 403);
	}

	#------------------------------------------------------------
	# Class settings validation
	#------------------------------------------------------------

	protected function handleClassValidator($input) : void
	{
		if (!class_exists($input['class']))
			parent::generateException("Class " . $input['class'] . " doesn't exist.", 400);
		if (!method_exists($input['class'], $input['method']))
			parent::generateException("Method " . $input['method'] . " doesn't exist.", 400);
	}

	#------------------------------------------------------------
	# Method validation
	#------------------------------------------------------------

	protected function handleMethodValidator($input) : void
	{
        if (!($input['key'] == 'METHOD' && strtoupper($input['value']) == $_SERVER['REQUEST_METHOD']))
            parent::generateException("Unsupported request method.", 405);
	}
}