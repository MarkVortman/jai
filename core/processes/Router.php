<?php
# AUTOLOAD = ON
#------------------------------------------------------------
# Router
#------------------------------------------------------------
#
# 'Router' responsible for all the routing logic. Also he 
# one of the initial, important processes. About format:
# URL: my.app/mycontroller/hi or my.app/MYconTroller/HI
# will search: Mycontroller.php and method hi()

class Router extends Process
{

    public function init() : void
    {
    	$rawRoute = $this->getRawRoute();
    	RouterValidator::validate('Format', $rawRoute);
    	$this->showRoute($rawRoute);
    }

    protected function getRawRoute() : array
    {
        $raw = explode("/", array_key_first($_REQUEST));
        foreach ($raw as $key => $value)
            $raw[$key] = strtolower($value);

    	return $raw;
    }

    protected function showRoute($parameters) : void
    {
    	$controller = CNTD . ucfirst($parameters[0]) . '.php';
    	$class = ucfirst($parameters[0]);
    	$method = $parameters[1];

    	RouterValidator::validate('Physical', [
    		'controller' => $controller
    	]);
		require_once $controller;

    	RouterValidator::validate('Class', [
    		'class'  => $class, 
    		'method' => $method
    	]);
        $methodPair = $this->getRequestMethod($controller, $method);
        
        RouterValidator::validate('Method', $methodPair);
		$object = new $class;
		$object->$method();
    }

    protected function getRequestMethod($controller, $method) : array
    {
        $lines = file($controller);
        foreach ($lines as $line => $string){
            if (strstr($string, 'public function ' . $method)){
                $rMethod = $lines[$line - 1];
                break;
            }
        }
        $arr = explode('=', $rMethod);
        $key = trim(trim($arr[0]), ' # ');
        $value = trim($arr[1]);

        return ['key' => $key, 'value' => $value];
    }
}