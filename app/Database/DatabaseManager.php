<?php

declare(strict_types=1);

namespace NovaCore\Database;


use PDO;


class DatabaseManager
{

    protected PDO $connection;


    public function __construct(
        array $config
    )
    {

        $this->connection =
            Connection::make($config);

    }



    public function connection(): PDO
    {
        return $this->connection;
    }


}