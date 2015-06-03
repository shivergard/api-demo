<?php namespace Shivergard\ApiDemo;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Model;
use \Schema;
use \Config;
use \DB;
use \Artisan;

use Illuminate\Container\Container;

class ApiDemoConsole extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'api-demo:init';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'ApiDemo init.';


	private $role_id = false;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Container $app)
	{
		$this->app = $app;
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info('¯\(°_o)/¯');
		Model::unguard();
		if (class_exists('App\Model\Akwilon\Roles')){
			$this->createRole("App\Model\Akwilon\Roles");
		}else if (class_exists('App\User\Roles')){
			$this->createRole("App\User\Roles");
		}
		if (DB::table('users')->where('name' , 'api-demo')->select('id')->count() == 0){

			$user = 				array(
				'email'    => 'root@ApiDemo.dev',
	            "password" => \Hash::make("api-demo"),
	            "name"  => "api-demo"
	        );

	        if (isset($this->role_id) && $this->role_id){
	        	$user["username"] = "api-demo";
	        	$user["confirmation_code"] = "api-demo";
	        	$user["role_id"] = $this->role_id;
	        }
			\App\User::create($user);
			$this->info(' Mail: root@ApiDemo.dev');
			$this->info(' Passowrd: api-demo');

		}else{
			$this->info(' User exists');
		}
	}

	private function createRole($roleModel){

		$role = $roleModel::create(
			array(
				'name' => 'api-demo',
				'default_route' => '\Shivergard\ApiDemo\ApiDemoController@init',
				'parent_id' => 1
			)
		);
		$this->role_id = $role->id;
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
	}

}