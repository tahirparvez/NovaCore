<?php

declare(strict_types=1);

namespace NovaCore\Console\Kernel;

use NovaCore\Contracts\Console\CommandInterface;

class CommandRegistry
{
    private array $commands = [];

    public function register(CommandInterface $command): void
    {
        $this->commands[$command->signature()] = $command;
    }

    public function get(string $signature): ?CommandInterface
    {
        return $this->commands[$signature] ?? null;
    }

    public function all(): array
    {
        return $this->commands;
    }
}