<?php

declare(strict_types=1);

namespace NovaCore\Database\Grammar;


interface Grammar
{

  public function compileSelect(
    string $table,
    array $columns,
    array $wheres = [],
    array $orderBys = [],
    ?int $limit = null,
    ?int $offset = null
): string;

}