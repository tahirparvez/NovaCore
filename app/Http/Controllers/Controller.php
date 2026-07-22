<?php

declare(strict_types=1);

namespace NovaCore\Http\Controllers;


use NovaCore\Http\Response;


abstract class Controller
{

    protected function response(
        mixed $data,
        int $status = 200
    ): Response
    {
        return new Response(
            $data,
            $status
        );
    }


    protected function json(
        array $data,
        int $status = 200
    ): Response
    {
        return Response::json(
            $data,
            $status
        );
    }


}