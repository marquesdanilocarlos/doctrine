<?php

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

require __DIR__ . "/vendor/autoload.php";

$params = [
    'dbname' => 'doctrine',
    'user' => 'root',
    'password' => 'a654321',
    'host' => '172.17.0.1',
    'driver' => 'pdo_mysql'
];

/*$url = [
    'url'=>'mysql://root:a654321:172.17.0.1/doctrine'
];*/

$config = new Configuration();
$connection = DriverManager::getConnection($params, $config);

var_dump($connection);