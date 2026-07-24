<?php

declare(strict_types=1);

namespace NovaCore\Logging;


class Logger
{

    public function __construct(
        private LogWriter $writer
    )
    {

    }


    public function log(
        string $level,
        string $message
    ): void
    {

        $entry =
            date('Y-m-d H:i:s')
            ." [$level] "
            .$message;


        $this->writer->write($entry);

    }



    public function info(string $message): void
    {
        $this->log(
            LogLevel::INFO,
            $message
        );
    }



    public function error(string $message): void
    {
        $this->log(
            LogLevel::ERROR,
            $message
        );
    }



    public function warning(string $message): void
    {
        $this->log(
            LogLevel::WARNING,
            $message
        );
    }

}