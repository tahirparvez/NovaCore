<?php

use NovaCore\Core\Routing\RouteFacade as Route;


Route::get(
    '/',
    function(){

        return new \NovaCore\Http\Response(
            "Welcome to NovaCore 🚀"
        );

    }
);


Route::get(
    '/hello',
    function(){

        return new \NovaCore\Http\Response(
            "Hello NovaCore"
        );

    }
);