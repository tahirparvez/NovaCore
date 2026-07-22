<?php

declare(strict_types=1);

namespace NovaCore\Core\Routing;


class RouteFacade
{

    protected static Router $router;


    public static function setRouter(
        Router $router
    ):void
    {

        self::$router=$router;

    }



    public static function get(
        string $uri,
        mixed $action
    )
    {

        return self::$router->get(
            $uri,
            $action
        );

    }



    public static function post(
        string $uri,
        mixed $action
    )
    {

        return self::$router->post(
            $uri,
            $action
        );

    }


}