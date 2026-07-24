<?php

declare(strict_types=1);

namespace NovaCore\Database\Grammar;


class MySqlGrammar implements Grammar
{


  public function compileSelect(
    string $table,
    array $columns,
    array $wheres = [],
    array $orderBys = [],
    ?int $limit = null,
    ?int $offset = null
): string
{

    $columns = implode(
        ', ',
        $columns
    );


    $sql =
        "SELECT {$columns} FROM {$table}";


    if(count($wheres))
    {

        $conditions = [];


        foreach($wheres as $where)
        {

            $conditions[] =
                "{$where->column} {$where->operator} ?";

        }


        $sql .=
            " WHERE "
            .implode(
                " AND ",
                $conditions
            );

    }

if (!empty($orderBys)) {

    $orders = [];

    foreach ($orderBys as $order) {
        $orders[] = "{$order['column']} {$order['direction']}";
    }

    $sql .= ' ORDER BY '.implode(', ', $orders);
}

if ($limit !== null) {
    $sql .= " LIMIT {$limit}";
}

if ($offset !== null) {
    $sql .= " OFFSET {$offset}";
}

    return $sql;

}


}