<?php

declare(strict_types=1);

namespace NovaCore\Exceptions;
use NovaCore\Config\Environment;


use Throwable;


class ExceptionRenderer
{

   public function render(Throwable $exception): void
{

    http_response_code(500);


    if(Environment::isDebug())
    {

        echo "<h1>NovaCore Exception</h1>";

        echo "<hr>";

        echo "<b>Message:</b><br>";

        echo htmlspecialchars(
            $exception->getMessage()
        );


        echo "<br><br>";

        echo "<b>File:</b><br>";

        echo $exception->getFile();


        echo "<br><br>";

        echo "<b>Line:</b><br>";

        echo $exception->getLine();


        echo "<pre>";

        echo htmlspecialchars(
            $exception->getTraceAsString()
        );

        echo "</pre>";

    }
    else
    {

        echo "
        <h1>
        Something went wrong.
        </h1>

        <p>
        Please contact administrator.
        </p>
        ";

    }

}

}