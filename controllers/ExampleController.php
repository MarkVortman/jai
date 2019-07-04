<?php

class ExampleController extends Controller
{
	# METHOD=GET
	public function examplemethod()
	{	
		$obj = new stdClass;
		$obj->name = "John Doe"; 
		$obj->position = "Software Engineer"; 
		$obj->address = "53, nth street, city"; 
		$obj->status = "Best"; 
		Warden::point($obj);
		Warden::lastPoint(NULL);
		Respondent::json('hello');
	}
}