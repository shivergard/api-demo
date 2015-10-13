<?php namespace Shivergard\ApiDemo;

use App\Requests;

use Illuminate\Http\Request;

use \Carbon;
use \Config;
use \Route;


class OperationController extends \Shivergard\ApiDemo\SubCrudController {

    public $model = "\Shivergard\ApiDemo\Operations";

    public function init(){
        return view('api-demo::api-demo');
    }


    public function __construct(){
        //set default method alltimes
        $method = Route::current()->getParameter('method');
        $this->constantFilters['method_id'] = $method;
        parent::__construct();
    }
    

    /**
     * Display the specified resource.
     * @param  int  $iddd @return Response
     */
    public function show($method, $id){
        $modelName = $this->model;
        $list = $modelName::find($id);
        $view = view('api-demo::sub_crud.view' , array(
                'list' => $list,
                'fields' => $this->getAllColumnsNames($list),
                'controller' => $this->getClassName(true),
                'method' => $method
        ));

        if (isset($this->layout) && $this->layout){
            return View($this->layout , array('content' => $view));
        }else{
            return $view;
        }
        
    }

}