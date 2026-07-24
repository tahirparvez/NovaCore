<?php

declare(strict_types=1);

namespace NovaCore\Console\Commands;

use NovaCore\Console\Command;

class HelpCommand extends Command
{
    protected string $signature = 'help';

    protected string $description = 'Display available commands';

    public function handle(array $arguments = []): int
    {
        echo PHP_EOL;
        echo "NovaCore CLI".PHP_EOL;
        echo "============".PHP_EOL;
        echo PHP_EOL;

        echo "Available Commands".PHP_EOL;
        echo PHP_EOL;

        echo "about        Display framework information".PHP_EOL;
        echo "help         Show this help message".PHP_EOL;

        echo PHP_EOL;

        return 0;
    }
}