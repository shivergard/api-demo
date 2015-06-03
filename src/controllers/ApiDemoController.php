<?php namespace Shivergard\ApiDemo;

use App\Requests;

use Illuminate\Http\Request;

use \Carbon;

use \Config;


class ApiDemoController extends \Shivergard\ApiDemo\PackageController {

	public function init(){
		return view('api-demo::api-demo');
	}

}