<?php

declare(strict_types=1);

namespace NovaCore\Core\Routing;


class Route
{

    public function __construct(
        public string $method,
        public string $uri,
        public mixed $action
    )
    {

    }


    public function matches(
        string $method,
        string $uri
    ): bool
    {

        if($this->method !== $method)
        {
            return false;
        }


        $pattern = preg_replace(
            '#\{[^/]+\}#',
            '([^/]+)',
            $this->uri
        );


       return preg_match(
    '#^'.$pattern.'$#',
    $uri
) === 1;
    }



    public function parameters(
        string $uri
    ): array
    {

        preg_match_all(
            '#\{([^/]+)\}#',
            $this->uri,
            $keys
        );


        preg_match(
            '#^'.preg_replace(
                '#\{[^/]+\}#',
                '([^/]+)',
                $this->uri
            ).'$#',
            $uri,
            $values
        );


        array_shift($values);


        return array_combine(
            $keys[1],
            $values
        );

    }


}