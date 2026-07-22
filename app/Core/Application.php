<?php
declare(strict_types=1);
namespace NovaCore\Core;

use NovaCore\Core\Routing\Router;
use NovaCore\Core\Routing\RouteFacade;
use NovaCore\Core\Routing\ControllerResolver;






use NovaCore\Http\Kernel;



class Application
{


    protected Container $container;

    protected array $providers = [
    \NovaCore\Providers\CoreServiceProvider::class,
    \NovaCore\Providers\RoutingServiceProvider::class,
    \NovaCore\Providers\DatabaseServiceProvider::class,
];

protected array $loadedProviders = [];

public function __construct()
{
    $this->container = new Container();

    $this->registerProviders();

    $this->bootProviders();
}


protected function registerProviders(): void
{
    foreach ($this->providers as $providerClass) {

        $provider = new $providerClass($this);

        $provider->register();

        $this->loadedProviders[] = $provider;
    }
}

protected function bootProviders(): void
{
    foreach ($this->loadedProviders as $provider) {

        $provider->boot();

    }
}

//     public function __construct()
//     {

//         $this->container =
//             new Container();


//         $this->container->singleton(
//             self::class,
//             $this
//         );



// $this->container->singleton(
//     ControllerResolver::class,
//     new ControllerResolver(
//         $this->container
//     )
// );



// $router = $this->container->make(
//     Router::class
// );



// $this->container->singleton(
//     Router::class,
//     $router
// );


// RouteFacade::setRouter(
//     $router
// );


// require dirname(__DIR__,2)
// .'/routes/web.php';



//     }




    public function container():Container
    {

        return $this->container;

    }



    public function handle():void
    {

        $request =
            new \NovaCore\Http\Request();


        $kernel =
            new Kernel($this);



        $response =
            $kernel->handle(
                $request
            );


        $response->send();

    }


}