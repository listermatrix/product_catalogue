<?php
use Doctrine\DBAL\DriverManager;

try {
    return DriverManager::getConnection([
        'dbname' => $_ENV['DB_NAME'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASS'],
        'host' => $_ENV['DB_HOST'],
        'driver' => 'pdo_mysql',
    ]);
} catch (\Doctrine\DBAL\DBALException $e) {
    throw new \Exception($e->getMessage);
} catch (\Doctrine\DBAL\Exception $e) {
    throw new \Exception($e->getMessage);
}