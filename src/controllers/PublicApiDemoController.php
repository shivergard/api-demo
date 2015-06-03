<?php namespace Shivergard\ApiDemo;

use App\Requests;

use Illuminate\Http\Request;

use \Carbon;

use \Config;


class PublicApiDemoController extends \Shivergard\ApiDemo\PackageController {

	//empty constructor
	public function __construct(){}


	public function demo(){
		return view('api-demo::demo');
	}

}