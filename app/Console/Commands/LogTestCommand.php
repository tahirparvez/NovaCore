<?php

declare(strict_types=1);

namespace NovaCore\Console\Commands;


use NovaCore\Console\Command;
use NovaCore\Logging\Logger;
use NovaCore\Logging\LogWriter;


class LogTestCommand extends Command
{

    protected string $signature = 'log:test';


    protected string $description =
        'Test logging system';



    public function handle(array $arguments = []): int
    {

        $logger = new Logger(
            new LogWriter()
        );


        $logger->info(
            "NovaCore logging test successful"
        );


        echo "Log written successfully".PHP_EOL;


        return 0;

    }

}