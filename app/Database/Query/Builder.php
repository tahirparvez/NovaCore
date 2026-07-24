<?php

declare(strict_types=1);

namespace NovaCore\Database\Query;


use PDO;

use NovaCore\Database\Grammar\Grammar;



class Builder
{


    protected string $table;


    protected array $columns = ['*'];
    protected array $wheres = [];
    protected array $orderBys = [];

protected ?int $limit = null;

protected ?int $offset = null;



    public function __construct(
        protected PDO $pdo,
        protected Grammar $grammar
    )
    {

    }



    public function table(
        string $table
    ): self
    {

        $this->table = $table;


        return $this;

    }



    public function select(
        array $columns = ['*']
    ): self
    {

        $this->columns = $columns;


        return $this;

    }




    public function get(): array
    {

       $sql = $this->grammar->compileSelect(
    $this->table,
    $this->columns,
    $this->wheres,
    $this->orderBys,
    $this->limit,
    $this->offset
);


        $statement =
            $this->pdo->prepare($sql);


        $bindings = [];


foreach($this->wheres as $where)
{
    $bindings[] =
        $where->value;
}


$statement->execute(
    $bindings
);


        return $statement->fetchAll(
            PDO::FETCH_ASSOC
        );

    }


public function where(
    string $column,
    string $operator,
    mixed $value
): self
{

    $this->wheres[] =
        new WhereClause(
            $column,
            $operator,
            $value
        );


    return $this;

}

public function orderBy(
    string $column,
    string $direction = 'ASC'
): self
{

    $direction = strtoupper($direction);

    if (!in_array($direction, ['ASC', 'DESC'], true)) {
        $direction = 'ASC';
    }

    $this->orderBys[] = [
        'column' => $column,
        'direction' => $direction,
    ];

    return $this;
}

public function limit(int $limit): self
{
    $this->limit = $limit;

    return $this;
}


public function offset(int $offset): self
{
    $this->offset = $offset;

    return $this;
}


public function toSql(): string
{
    return $this->grammar->compileSelect(
        $this->table,
        $this->columns,
        $this->wheres,
        $this->orderBys,
        $this->limit,
        $this->offset
    );
}


}