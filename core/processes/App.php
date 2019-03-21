<?php

class App extends Process
{

    public function init() 
    {
    	$router = new Router();
        $validator = new CoreValidator();
        $router->init();
        $validator->validate();
    }
}