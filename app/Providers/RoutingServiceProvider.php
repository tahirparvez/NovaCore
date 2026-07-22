<?php

declare(strict_types=1);

namespace NovaCore\Providers;

use NovaCore\Core\Routing\ControllerResolver;
use NovaCore\Core\Routing\RouteFacade ;
use NovaCore\Core\Routing\Router;

class RoutingServiceProvider extends ServiceProvider
{
 public function register(): void
{
    $container = $this->app->container();

    $container->singleton(
        ControllerResolver::class,
        new ControllerResolver($container)
    );

    $router = $container->make(Router::class);

    $container->singleton(
        Router::class,
        $router
    );

    RouteFacade::setRouter($router);
}

   public function boot(): void
{
    require dirname(__DIR__,2).'/routes/web.php';
}
}