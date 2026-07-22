<?php

declare(strict_types=1);

namespace NovaCore\Http;


use NovaCore\Core\Application;



class Kernel
{


    protected Application $app;



    public function __construct(
        Application $app
    )
    {

        $this->app=$app;

    }




    public function handle(
        Request $request
    ): Response
    {


        $router =
$this->app->container()
->make(
    \NovaCore\Core\Routing\Router::class
);


return $router->dispatch(
    $request
);


    }



}