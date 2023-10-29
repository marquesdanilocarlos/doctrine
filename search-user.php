<?php

use App\Entities\User;
use App\Helper\EntityManagerCreator;

require __DIR__ . "/vendor/autoload.php";

$em = EntityManagerCreator::createEntityManager();
$userEntity = User::class;

$query = $em->createQuery("SELECT u FROM {$userEntity} u");
$allUsers = $query->getResult();

//var_dump($allUsers);

$query = $em->createQuery("SELECT u FROM " . User::class . " u WHERE u.id > :number");
$query->setParameter("number", $_GET['num'] ?? 1);
$allUsers = $query->getResult();

//var_dump($allUsers);

$qb = $em->createQueryBuilder();
$qb->select('u')
    ->from($userEntity, "u")
    ->where('u.id > :number')
    ->setParameter('number', $_GET['num'] ?? 0);

$queryDql = $qb->getQuery();
$allUsers = $queryDql->getResult();

var_dump($allUsers);

