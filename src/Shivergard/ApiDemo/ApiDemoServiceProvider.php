<?php namespace Shivergard\ApiDemo;

use Illuminate\Support\ServiceProvider;
use App;

class ApiDemoServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{

		//config publish

		$publishData = array(
		    __DIR__.'/api-demo.php' => config_path('api-demo.php'),
		    realpath(__DIR__ .'/../../migrations') => $this->app->databasePath().'/migrations',
		);

		$this->publishes($publishData);

		App::forgetMiddleware('Illuminate\Foundation\Http\Middleware\VerifyCsrfToken');
		App::middleware('Shivergard\ApiDemo\VerifyCsrfToken');

		require __DIR__ .'/../../routes.php';
		$this->loadViewsFrom(__DIR__.'/../../views', 'api-demo');
		$this->commands('Shivergard\ApiDemo\ApiDemoConsole');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */#6 [internal function]: Illuminate\Foundation\Application->Illuminate\Foundation\{closure}(Object(Shivergard\ApiDemo\ApiDemoServiceProvider), 23)
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
