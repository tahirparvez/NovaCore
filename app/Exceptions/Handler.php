<?php

declare(strict_types=1);

namespace NovaCore\Exceptions;


use Throwable;

use NovaCore\Logging\Logger;


class Handler
{


    public function __construct(
        private Logger $logger
    )
    {

    }



    public function register(): void
    {

        set_exception_handler(
            function(Throwable $exception)
            {

                $this->report($exception);

                $this->render($exception);

            }
        );

    }




    private function report(Throwable $exception): void
    {

        $this->logger->error(
            $exception->getMessage()
            ." in "
            .$exception->getFile()
            ." line "
            .$exception->getLine()
        );

    }





    private function render(Throwable $exception): void
    {

        $renderer =
            new ExceptionRenderer();


        $renderer->render(
            $exception
        );

    }


}