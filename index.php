<?php
require_once __DIR__ . '/vendor/autoload.php';
use Database\Connection;
use Dotenv\Dotenv;

echo "my name is khan am an elephant";

$var = (new Database\Connection)->connect();

dd($var);