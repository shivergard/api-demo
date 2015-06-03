<?php namespace Shivergard\ApiDemo;

use App\Requests;

use Illuminate\Http\Request;

use \Carbon;

use \Config;


use \Shivergard\ApiDemo\Methods;
use \Shivergard\ApiDemo\Params;


class PublicApiDemoController extends \Shivergard\ApiDemo\PackageController {

	//empty constructor
	public function __construct(){}


	public function demo(){

		$methods = Methods::all();

		return view('api-demo::demo' , array('methods' => $methods));
	}

}