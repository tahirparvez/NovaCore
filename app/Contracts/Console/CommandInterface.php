<?php

declare(strict_types=1);

namespace NovaCore\Contracts\Console;

interface CommandInterface
{
    public function signature(): string;

    public function description(): string;

    public function handle(array $arguments = []): int;
}