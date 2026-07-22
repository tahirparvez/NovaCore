<?php

declare(strict_types=1);


namespace NovaCore\Core;


use NovaCore\Contracts\ContainerInterface;


class Application
{


    protected ContainerInterface $container;



    public function __construct()
    {

        $this->container=new Container();

    }



    public function container():ContainerInterface
    {

        return $this->container;

    }



    public function run():void
    {

        echo "NovaCore Framework v0.0.1 Running 🚀";

    }


}