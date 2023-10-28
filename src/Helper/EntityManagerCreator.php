<?php

namespace App\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{

    public static function createEntityManager(): EntityManager
    {
        $path = __DIR__."/src/Entities";
        $isDevMode = true;

        $config = ORMSetup::createAttributeMetadataConfiguration([
            $path,
            $isDevMode
        ]);

        $dbParams = [
            'dbname' => 'doctrine',
            'user' => 'root',
            'password' => 'a654321',
            'host' => '172.17.0.1',
            'driver' => 'pdo_mysql'
        ];

        $connection = DriverManager::getConnection($dbParams, $config);

        return new EntityManager($connection, $config);

    }


}