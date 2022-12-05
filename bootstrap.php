<?php

require "vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;




$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


$capsule = new Capsule;


$capsule->addConnection([
    'host' =>     $_ENV['DB_HOST'],
    'username' =>     $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'database' =>   $_ENV['DB_NAME'],
    'driver' =>   $_ENV['DB_DRIVER'],
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();