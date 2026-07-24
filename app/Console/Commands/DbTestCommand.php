<?php

declare(strict_types=1);

namespace NovaCore\Console\Commands;


use NovaCore\Console\Command;

use NovaCore\Database\Facades\DB;



class DbTestCommand extends Command
{

    protected string $signature = 'db:test';


    protected string $description =
        'Test query builder';



    public function handle(
        array $arguments = []
    ): int
    {


       $users = DB::table('students')
    ->where('class','=','10A')
    ->orderBy('name')
    ->limit(10)
    ->get();


        print_r($users);



        return 0;

    }

}