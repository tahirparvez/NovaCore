<?php
/*
use NovaCore\Core\Routing\RouteFacade as Route;


use NovaCore\Http\Controllers\HomeController;


Route::get(
    '/',
    HomeController::class
);

Route::get(
    '/hello',
    function(){

        return new \NovaCore\Http\Response(
            "Hello NovaCore"
        );

    }
);

*/
 

use NovaCore\Core\Routing\RouteFacade as Route;
use NovaCore\Http\Controllers\HomeController;
use NovaCore\Database\Facades\DB;


Route::get(
    '/',
    HomeController::class
);


 