<?php

declare(strict_types=1);

namespace NovaCore\Contracts;


interface ContainerInterface
{

    public function bind(
        string $abstract,
        mixed $concrete
    ): void;


    public function singleton(
        string $abstract,
        mixed $concrete
    ): void;


    public function make(
        string $abstract
    ): mixed;


}