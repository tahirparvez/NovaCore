<?php

declare(strict_types=1);

namespace NovaCore\Logging;

class LogWriter
{
    private string $file;


    public function __construct()
    {
        $this->file = dirname(__DIR__,2)
            .'/storage/logs/novacore.log';
    }


    public function write(string $message): void
    {
        file_put_contents(
            $this->file,
            $message.PHP_EOL,
            FILE_APPEND
        );
    }
}