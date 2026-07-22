<?php

declare(strict_types=1);

namespace NovaCore\Core;

class Application
{
    protected Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function container(): Container
    {
        return $this->container;
    }

    public function run(): void
    {
        echo "NovaCore Framework Started 🚀";
    }
}