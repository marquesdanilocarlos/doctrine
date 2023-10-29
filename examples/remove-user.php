<?php

use App\Entities\User;
use App\Helper\EntityManagerCreator;

require __DIR__ . "/vendor/autoload.php";

$em = EntityManagerCreator::createEntityManager();

$userEntity = User::class;
$query = $em->createQuery("DELETE FROM {$userEntity} u WHERE u.id > 2");
$result = $query->getResult();

var_dump($result);