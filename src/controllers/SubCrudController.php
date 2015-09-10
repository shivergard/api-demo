<?php namespace Shivergard\ApiDemo;

use App\Requests;

use Illuminate\Http\Request;

use \Carbon;
use \Config;
use \Route;


class SubCrudController extends \Shivergard\ApiDemo\CrudController {

    /**
     * Display the specified resource.
     * @param  int  $iddd @return Response
     */
    public function show($id){

        $this->bladeDir = 'sub_crud';

        $modelName = $this->model;
        $list = $modelName::find($id);
        $view = view('api-demo::methods.view' , array(
                'list' => $list,
                'fields' => $this->getAllColumnsNames($list),
                'method' => Route::current()->getParameter('method'),
                'controller' => $this->getClassName(true),
        ));

        if (isset($this->layout) && $this->layout){
            return View($this->layout , array('content' => $view));
        }else{
            return $view;
        }
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){

        $this->bladeDir = 'sub_crud';

        $modelName = $this->model;
        $list = new $modelName();

        $viewDetails = array(
            'fields' => $this->getAllColumnsNames($list , true),
            'method' => Route::current()->getParameter('method'),
            'controller' => $this->getClassName(true)
        );

        $view = View($this->bladeDir.'.create' , $viewDetails);

        if (isset($this->layout) && $this->layout){
            return View($this->layout , array('content' => $view));
        }else{
            return $view;
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){

        $this->bladeDir = 'sub_crud';
        
        $modelName = $this->model;
        $list = $modelName::find($id);
        $view = view($this->bladeDir.'.edit' , array(
                'list' => $list,
                'fields' => $this->getAllColumnsNames($list , true),
                'method' => Route::current()->getParameter('method'),
                'controller' => $this->getClassName(true),
                'model_name' => $modelName

        ));

        if (isset($this->layout) && $this->layout){
            return View($this->layout , array('content' => $view));
        }else{
            return $view;
        }
    }

}