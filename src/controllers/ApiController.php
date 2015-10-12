<?php namespace Shivergard\ApiDemo;

use App\Requests;

use Illuminate\Http\Request;

use \Shivergard\ApiDemo\Operations;


class ApiController extends \Shivergard\ApiDemo\PackageController {

	//empty constructor
    public function __construct(){}

	public function apiCall($method){
		$return = array('status' => 0);

		$op = Operations::where('name' , $method);

		if ($op->count() > 0){
			$op->first();
			$class = $op->class_path;
			$method = $op->class_method;
			$classObject = new $class();
			$return = $classObject->$class_method(Request::all());
		}

		return \Response::json($return);
	}

}