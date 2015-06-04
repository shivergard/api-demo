To Start using it add to composer.json repozitory

    "repositories": [
      {
      "type": "git",
       "url": "git@github.com:shivergard/api-demo.git"
      }
    ],

and add requirements

	"require": {
		...
        "shivergard/api-demo" : "dev-master" 
    },

and add service provider

		'providers' => [
		...
      'Shivergard\ApiDemo\ApiDemoServiceProvider',
		...

To start use :

  php artisan api-demo:init

To get user creditals
  ¯\(°_o)/¯
   Mail: root@ApiDemo.dev
   Passowrd: api-demo