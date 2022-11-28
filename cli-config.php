<?php

require 'vendor/autoload.php';

use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(getcwd());
$dotenv->load();

$config = new PhpFile('migrations.php'); // Or use one of the Doctrine\Migrations\Configuration\Configuration\* loaders

$params = [
  'host' =>     $_ENV['DB_HOST'],
  'user' =>     $_ENV['DB_USER'],
  'password' => $_ENV['DB_PASS'],
  'dbname' =>   $_ENV['DB_NAME'],
  'driver' =>   $_ENV['DB_DRIVER'] ?? 'pdo_sqlite',
];

$paths = [__DIR__.'/Entities'];
$isDevMode = true;

$ORMconfig = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($params, $ORMconfig);

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));