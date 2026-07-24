<?php

declare(strict_types=1);

namespace NovaCore\Providers;


use NovaCore\Core\Application;

use NovaCore\Database\Connection;
use NovaCore\Database\DatabaseManager;

use NovaCore\Database\Facades\DB;
use NovaCore\Database\Query\Builder;
use NovaCore\Database\Grammar\MySqlGrammar;


class DatabaseServiceProvider
{


    public function register(): void
    {

        $config = require __DIR__.'/../../config/database.php';


        $manager = new DatabaseManager($config);


        $pdo = $manager->connection();



        $grammar = new MySqlGrammar();


        $builder = new Builder(
            $pdo,
            $grammar
        );


        DB::setBuilder(
            $builder
        );

    }


    public function boot(): void
    {

    }

}