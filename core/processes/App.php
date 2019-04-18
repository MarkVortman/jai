<?php
# AUTOLOAD = ON
#------------------------------------------------------------
# Lorem ips
#------------------------------------------------------------
#
# Lorem ips
#

class App extends Process
{

    public function init() : void
    {   
    	$this->setSettings();
    	$router = new Router();
        $validator = new CoreValidator();
        $router->init();
    }

    protected function setSettings() : void 
    {
    	#  AD
        #----------------------------------------------------
    	# Our main constant AD - point of entry for other 
    	# constants. 
    	#
    	define('AD', getcwd() . '/');

    	# Controllers directory ( CNTD )
        #----------------------------------------------------
    	# We need defined path to our controllers. By default
    	# directory must have name 'controllers.'
    	#
    	define('CNTD', AD . 'controllers/');
    }
}