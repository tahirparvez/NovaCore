<?php

declare(strict_types=1);

namespace NovaCore\Database\Query;


use PDO;

use NovaCore\Database\Grammar\Grammar;



class Builder
{


    protected string $table;


    protected array $columns = ['*'];



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

        $sql =
            $this->grammar
                 ->compileSelect(
                    $this->table,
                    $this->columns
                 );


        $statement =
            $this->pdo->prepare($sql);


        $statement->execute();


        return $statement->fetchAll(
            PDO::FETCH_ASSOC
        );

    }


}