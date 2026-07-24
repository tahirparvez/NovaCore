<?php

declare(strict_types=1);

namespace NovaCore\Console;

use NovaCore\Contracts\Console\CommandInterface;

abstract class Command implements CommandInterface
{
    protected string $signature = '';

    protected string $description = '';

    public function signature(): string
    {
        return $this->signature;
    }

    public function description(): string
    {
        return $this->description;
    }

    abstract public function handle(array $arguments = []): int;
}