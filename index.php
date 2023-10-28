<?php

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Platforms\MySQLPlatform;

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

$schema = new Schema();

$articleTable = $schema->createTable('articles');
$articleTable->addColumn('id', 'integer', ['unsigned' => true]);
$articleTable->addColumn('subject', 'string', ['length' => 100]);
$articleTable->addColumn('content', 'text');
$articleTable->setPrimaryKey(['id']);

$articleTable->addColumn('user_id', 'integer');
$articleTable->addForeignKeyConstraint('user', ['user_id'], ['id']);

$queries = $schema->toSql(new MySQLPlatform());
var_dump($queries);
exit;

foreach ($queries as $query) {
    $connection->query($query);
}