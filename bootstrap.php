<?php
// bootstrap.php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__.'/app'],
    isDevMode: true,
);

$connection = DriverManager::getConnection([
    'driver' => 'pdo_mysql',
    'host' => 'db',
    'port' => '3306',
    'user' => 'user',
    'password' => 'password',
    'dbname' => 'database',
], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);
