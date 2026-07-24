<?php

declare(strict_types=1);

namespace NovaCore\Config;


class Environment
{

    public static function get(string $key, mixed $default = null): mixed
    {
        return $_ENV[$key] ?? $default;
    }



    public static function isDebug(): bool
    {
        return filter_var(
            self::get('APP_DEBUG', false),
            FILTER_VALIDATE_BOOLEAN
        );
    }



    public static function isProduction(): bool
    {
        return self::get('APP_ENV') === 'production';
    }

}