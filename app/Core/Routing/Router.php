<?php

declare(strict_types=1);

namespace NovaCore\Core\Routing;


use NovaCore\Http\Request;
use NovaCore\Http\Response;
use NovaCore\Core\Routing\ControllerResolver;

class Router
{


   protected RouteCollection $routes;

protected ControllerResolver $resolver;



   public function __construct(
    ControllerResolver $resolver
)
{

    $this->routes =
        new RouteCollection();


    $this->resolver =
        $resolver;

}



    public function get(
        string $uri,
        mixed $action
    ):void
    {

        $this->add(
            'GET',
            $uri,
            $action
        );

    }



    public function post(
        string $uri,
        mixed $action
    ):void
    {

        $this->add(
            'POST',
            $uri,
            $action
        );

    }




    protected function add(
        string $method,
        string $uri,
        mixed $action
    ):void
    {

        $this->routes->add(
            new Route(
                $method,
                $uri,
                $action
            )
        );

    }




    public function dispatch(
        Request $request
    ):Response
    {


        foreach(
            $this->routes->all()
            as $route
        )
        {


            if(
                $route->matches(
                    $request->method(),
                    $request->uri()
                )
            )
            {


                return $this->runAction(
                    $route,
                    $request
                );


            }

        }



        return new Response(
            "404 - Page Not Found",
            404
        );


    }




    protected function runAction(
        Route $route,
        Request $request
    ):Response
    {


        if(is_callable($route->action))
        {

            return call_user_func(
                $route->action,
                $request
            );

        }



      if(is_string($route->action)
)
{

    return $this->resolver->resolve(
        $route->action
    );

}


return new Response(
    "Invalid Route Action",
    500
);


    }


}