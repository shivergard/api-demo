<?php namespace Shivergard\ApiDemo;

use Illuminate\Database\Eloquent\Model;

use \Shivergard\ApiDemo\BaseModel;

use Illuminate\Http\Request;

class Methods extends \Shivergard\ApiDemo\BaseModel {

	protected $table = 'api_methods';


	public function params(){
		return $this->hasMany('\Shivergard\ApiDemo\Params', 'param_id', 'id');
	}

}