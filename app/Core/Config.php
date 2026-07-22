<?php

/*declare(strict_types=1);

namespace NovaCore\Core;

class Container
{
    protected array $bindings = [];

    public function bind(string $abstract, mixed $concrete): void
    {
        $this->bindings[$abstract] = $concrete;
    }

    public function singleton(string $abstract, mixed $concrete): void
    {
        $this->bindings[$abstract] = $concrete;
    }

    public function make(string $abstract): mixed
    {
        if (!isset($this->bindings[$abstract])) {
            throw new \Exception("Class {$abstract} is not registered.");
        }

        return $this->bindings[$abstract];
    }
}

*/
 

declare(strict_types=1);

namespace NovaCore\Core;


class Config
{

    protected static array $items = [];


    public static function load(array $config): void
    {
        self::$items = $config;
    }


    public static function get(
        string $key,
        mixed $default=null
    ): mixed
    {

        $parts = explode('.', $key);

        $value = self::$items;


        foreach($parts as $part)
        {

            if(!isset($value[$part]))
            {
                return $default;
            }


            $value = $value[$part];

        }


        return $value;

    }

}