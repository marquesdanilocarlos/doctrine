<?php

use App\Entities\User;
use App\Helper\EntityManagerCreator;

require __DIR__ . "/vendor/autoload.php";

$em = EntityManagerCreator::createEntityManager();

$query = $em->createQuery("SELECT u FROM " . User::class. " u");
$allUsers = $query->getResult();

var_dump($allUsers);

$query = $em->createQuery("SELECT u FROM " . User::class. " u WHERE u.id > :number");
$query->setParameter("number", $_GET['num']);
$allUsers = $query->getResult();