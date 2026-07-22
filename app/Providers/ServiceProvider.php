<?php

declare(strict_types=1);


namespace NovaCore\Providers;


use NovaCore\Core\Application;


abstract class ServiceProvider
{


    public function __construct(
        protected Application $app
    )
    {

    }



    abstract public function register(): void;



    public function boot(): void
    {

    }


}