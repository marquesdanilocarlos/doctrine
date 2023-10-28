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

$filter = '';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $filter = " where id = {$id}";
}

$sql = "SELECT * FROM users{$filter}";
$result = $connection->query($sql);

while($row = $result->fetch()) {
    echo $row['name'] . '<br/>';
}