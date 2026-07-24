<?php

declare(strict_types=1);

namespace NovaCore\Exceptions;


class ExceptionContext
{

    public function __construct(
        public readonly string $reference,
        public readonly string $environment
    )
    {

    }

}