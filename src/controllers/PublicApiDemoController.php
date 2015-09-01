<?php namespace Shivergard\ApiDemo;

use App\Requests;

use Illuminate\Http\Request;

use \Carbon;

use \Config;


use \Shivergard\ApiDemo\Methods;
use \Shivergard\ApiDemo\Params;

use \GuzzleHttp\Client;
use \GuzzleHttp\Exception\BadResponseException;



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

    public function postRequest(){
        if(!\Request::ajax())
            return \Redirect::to(action("\Shivergard\ApiDemo\PublicApiDemoController@demo"));

        $return = array('response' => 'invalid params');

        //do the guzzle request
        $instance = Methods::where('id', \Input::get('id'));
        if ($instance->count() > 0){
            $client = new Client();
            $options = array('query' => \Input::all());

            try {
                if ($instance->first()->type == 'POST'){
                    $response = $client->post($instance->first()->path, $options);
                }else{
                    $response = $client->get($instance->first()->path, $options);
                }
                
                $return['response'] = json_encode($response->json());

            } catch (BadResponseException $ex) {
                $return['response'] =  'problems : '.$ex->getResponse()->getBody(); //$ex->getResponse()->getBody();
            }   

        }

        return \Response::json($return);
    }

}