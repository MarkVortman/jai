<?php
# AUTOLOAD = ON
#------------------------------------------------------------
# Controller validator
#------------------------------------------------------------
#
# Controller validator 
#

class ControllerValidator extends Validator
{
	#------------------------------------------------------------
	# Response validation
	#------------------------------------------------------------

	protected function handleResponseValidator($input) : void
	{
        if (md5($input['method']) != $_SESSION['rcnfm'])
            parent::generateException("In controller you must use Respondent for generation response.", 500);
	}
}