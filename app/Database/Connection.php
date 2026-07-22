<?php

declare(strict_types=1);

namespace NovaCore\Database;


use PDO;


class Connection
{


    public static function make(
        array $config
    ): PDO
    {

        $dsn =
        "{$config['driver']}:host={$config['host']};port={$config['port']};dbname={$config['database']};charset=utf8mb4";


        return new PDO(
            $dsn,
            $config['username'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE =>
                PDO::ERRMODE_EXCEPTION,

                PDO::ATTR_DEFAULT_FETCH_MODE =>
                PDO::FETCH_ASSOC
            ]
        );

    }

}