<?php
require 'vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\Tools\Setup;

// Migrations config file, see https://www.doctrine-project.org/projects/doctrine-migrations/en/3.6/reference/configuration.html
$config = new PhpFile(__DIR__ . '/migrations.php');

// Adapt to your DB connection parameters or re-use config file from your application
$dbParams = [
    'dbname' => 'doctrine',
    'user' => 'root',
    'password' => 'a654321',
    'host' => '172.17.0.1',
    'driver' => 'pdo_mysql'
];
$connection = DriverManager::getConnection( $dbParams );


// This assumes annonations/attributes for ORM mapping
$isDev = true;
$path = [__DIR__."/src/Entities"];
$OrmConfig = Setup::createAttributeMetadataConfiguration(
    $path,
    $isDev,
    null,
    null,
    false
);


$entityManager = new EntityManager( $connection, $OrmConfig );
return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));