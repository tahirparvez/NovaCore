<?php

declare(strict_types=1);

namespace NovaCore\Database\Facades;


use NovaCore\Database\DatabaseManager;


class DB
{

    protected static DatabaseManager $manager;


    public static function setManager(
        DatabaseManager $manager
    ): void
    {
        self::$manager = $manager;
    }


    public static function connection()
    {
        return self::$manager->connection();
    }

}