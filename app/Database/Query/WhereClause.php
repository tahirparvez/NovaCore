<?php

declare(strict_types=1);

namespace NovaCore\Database\Query;


class WhereClause
{

    public function __construct(
        public string $column,
        public string $operator,
        public mixed $value
    )
    {

    }


}