<?php


use NovaCore\Core\Application;



function app(
    ?string $abstract=null
)
{


    global $application;



    if(!$abstract)
    {

        return $application;

    }



    return $application
        ->container()
        ->make($abstract);


}