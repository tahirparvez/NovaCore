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


        return new Response(
            "NovaCore Request Received 🚀"
        );


    }



}