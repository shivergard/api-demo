<?php namespace Shivergard\ApiDemo;

use Illuminate\Support\ServiceProvider;

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
		$this->publishes(array(
		    __DIR__.'/api-demo.php' => config_path('api-demo.php'),
		    realpath(__DIR__ .'/../../migrations') => $this->app->databasePath().'/migrations',
		));

		require __DIR__ .'/../../routes.php';
		$this->loadViewsFrom(__DIR__.'/../../views', 'api-demo');
		$this->commands('Shivergard\ApiDemo\ApiDemoConsole');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
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
