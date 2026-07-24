<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use NovaCore\Core\Application;
 
use NovaCore\Core\Config;


use NovaCore\Exceptions\Handler;
use NovaCore\Logging\Logger;
use NovaCore\Logging\LogWriter;



require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

date_default_timezone_set($_ENV['TIMEZONE'] ?? 'UTC');


$dotenv = Dotenv::createImmutable(
    dirname(__DIR__)
);

$dotenv->load();


require_once dirname(__DIR__)
.'/app/helpers.php';


Config::load([
    'database'=>require dirname(__DIR__)
    .'/config/database.php'
]);



$handler = new Handler(
    new Logger(
        new LogWriter()
    )
);


$handler->register();

return new Application();

 
/*
declare(strict_types=1);


use Dotenv\Dotenv;
use NovaCore\Core\Application;



require_once dirname(__DIR__)
.'/vendor/autoload.php';


require_once dirname(__DIR__)
.'/app/Support/helpers.php';



$dotenv=Dotenv::createImmutable(
    dirname(__DIR__)
);


$dotenv->safeLoad();



date_default_timezone_set(
    $_ENV['TIMEZONE'] ?? 'UTC'
);



$application=new Application();



return $application;

*/