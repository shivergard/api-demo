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

	public function getParams(){
		if(!\Request::ajax())
            return \Redirect::to(action("\Shivergard\ApiDemo\PublicApiDemoController@demo"));
        $return = array('instance' , 'params');
        $instance = Methods::where('id', \Input::get('id'));
        if ($instance->count() > 0){
        	$return['instance'] = $instance->first()->toArray();
        	$instance = $instance->first();

	        if ($instance->params()->count() > 0)
	        	$return['params'] = $instance->params()->get()->toArray();
        }
        return \Response::json($return);		
	}

}