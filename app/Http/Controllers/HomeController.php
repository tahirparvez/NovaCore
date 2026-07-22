<?php

declare(strict_types=1);

namespace NovaCore\Http\Controllers;


use NovaCore\Http\Response;


class HomeController extends Controller
{


    public function index(): Response
    {

        return $this->json(
            [
                "framework"=>"NovaCore",
                "version"=>"0.0.4",
                "status"=>"running"
            ]
        );

    }


}