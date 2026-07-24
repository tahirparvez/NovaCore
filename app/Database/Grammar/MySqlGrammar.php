<?php

declare(strict_types=1);

namespace NovaCore\Database\Grammar;


class MySqlGrammar implements Grammar
{


    public function compileSelect(
        string $table,
        array $columns
    ): string
    {

        $columns = implode(
            ', ',
            $columns
        );


        return "SELECT {$columns} FROM {$table}";

    }


}`