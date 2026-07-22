<?php

declare(strict_types=1);

namespace NovaCore\Core;


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