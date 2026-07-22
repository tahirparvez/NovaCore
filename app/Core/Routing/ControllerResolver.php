<?php

declare(strict_types=1);

namespace NovaCore\Core\Routing;


use NovaCore\Core\Container;
use NovaCore\Http\Response;


class ControllerResolver
{


    public function __construct(
        protected Container $container
    )
    {

    }



    public function resolve(
        string $controller,
        string $method = 'index',
        array $parameters = []
    ): Response
    {


        $instance =
            $this->container->make(
                $controller
            );


        return call_user_func_array(
            [
                $instance,
                $method
            ],
            $parameters
        );


    }


}