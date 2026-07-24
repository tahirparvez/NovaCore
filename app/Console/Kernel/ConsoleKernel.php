<?php

declare(strict_types=1);

namespace NovaCore\Console\Kernel;

use NovaCore\Console\Commands\AboutCommand;
use NovaCore\Console\Commands\HelpCommand;
use NovaCore\Console\Commands\LogTestCommand;

class ConsoleKernel
{
    public function run(array $argv): int
    {
        $registry = new CommandRegistry();

        $registry->register(new AboutCommand());
        $registry->register(new HelpCommand());

        $registry->register(
    new LogTestCommand()
);
        
        $command = $argv[1] ?? 'help';

        $instance = $registry->get($command);

        if (!$instance) {
            echo "Unknown command: {$command}".PHP_EOL;
            return 1;
        }

        return $instance->handle(array_slice($argv, 2));
    }
}