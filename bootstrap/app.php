<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use NovaCore\Core\Application;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

date_default_timezone_set($_ENV['TIMEZONE'] ?? 'UTC');

return new Application();