<?php namespace Shivergard\ApiDemo;

use App\Requests;

use Illuminate\Http\Request;

use \Carbon;
use \Config;


class ApiDemoController extends \Shivergard\ApiDemo\CrudController {

    public $model = "\Shivergard\ApiDemo\Methods";

    public function init(){
        return view('api-demo::api-demo');
    }

    /**
     * Display the specified resource.
     * @param  int  $iddd @return Response
     */
    public function show($id){
        $modelName = $this->model;
        $list = $modelName::find($id);
        $view = view('api-demo::methods.view' , array(
                'list' => $list,
                'fields' => $this->getAllColumnsNames($list),
                'controller' => $this->getClassName(true),
        ));

        if (isset($this->layout) && $this->layout){
            return View($this->layout , array('content' => $view));
        }else{
            return $view;
        }
        
    }

}