<?php

declare(strict_types=1);

namespace NovaCore\Console\Commands;

use NovaCore\Console\Command;

class AboutCommand extends Command
{
    protected string $signature = 'about';

    protected string $description = 'Display framework information';

    public function handle(array $arguments = []): int
    {
        echo PHP_EOL;
        echo "====================================".PHP_EOL;
        echo "        NovaCore Framework".PHP_EOL;
        echo "====================================".PHP_EOL;
        echo PHP_EOL;

        echo "Version      : 0.2.1".PHP_EOL;
        echo "PHP Version  : ".PHP_VERSION.PHP_EOL;
        echo "Environment  : ".($_ENV['APP_ENV'] ?? 'development').PHP_EOL;
        echo PHP_EOL;
        echo "Built for IoT • SaaS • Enterprise".PHP_EOL;
        echo PHP_EOL;

        return 0;
    }
}