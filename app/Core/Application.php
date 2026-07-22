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



    public function __construct()
    {

        $this->container =
            new Container();


        $this->container->singleton(
            self::class,
            $this
        );



$this->container->singleton(
    ControllerResolver::class,
    new ControllerResolver(
        $this->container
    )
);



$router = $this->container->make(
    Router::class
);



$this->container->singleton(
    Router::class,
    $router
);


RouteFacade::setRouter(
    $router
);


require dirname(__DIR__,2)
.'/routes/web.php';



    }




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