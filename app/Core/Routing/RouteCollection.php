<?php

declare(strict_types=1);

namespace NovaCore\Core\Routing;


class RouteCollection
{

    protected array $routes=[];


    public function add(Route $route):void
    {

        $this->routes[]=$route;

    }



    public function all():array
    {

        return $this->routes;

    }


}