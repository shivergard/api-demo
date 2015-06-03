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