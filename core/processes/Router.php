<?php

class Router extends Process
{

    public function init()
    {
    	$rawRoute = $this->getRawRoute();
    	RouterValidator::validate($rawRoute);
    }

    public function getRawRoute() 
    {
    	return explode("/", array_key_first($_REQUEST));
    }
}