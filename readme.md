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

http://laravel.io/forum/11-14-2014-disabling-the-csrf-middleware-in-laravel-5 - To enable Api POST methods

To attach API support need to add params


    if (Config::get('api-demo.api_operations')){
        $apiClass = '\YOUR_PACKAGE\ApiClass';
        $methods = get_class_methods($apiClass);

        foreach ($methods as $method_name) {

            $method = new \Shivergard\ApiDemo\Methods();
            $method->name = $method_name;
            $method->description = $method_name;
            $method->type = 'POST';

            $method->path = Config::get('app.url').'/api/v1/'.$method_name;

            if ($method->save()){
                $operation = new \Shivergard\ApiDemo\Operations();
                $operation->name = $method_name;

                $operation->class_path = $apiClass;
                $operation->class_method = $method_name;

                $operation->method_id = $method->id;

                if ($operation->save()){
                    $this->info(' API Method: '.$method->path.' added');
                }

            }
        }
    }

