<?php
/*
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

*/

 

declare(strict_types=1);

namespace NovaCore\Providers;


use NovaCore\Database\DatabaseManager;
use NovaCore\Database\Facades\DB;
use NovaCore\Core\Config;


class DatabaseServiceProvider 
extends ServiceProvider
{


    public function register():void
    {

    	

        $database =
            new DatabaseManager(
                Config::get(
                    'database'
                )
            );


        $this->app
        ->container()
        ->singleton(
            DatabaseManager::class,
            $database
        );


        DB::setManager(
            $database
        );

    }


}