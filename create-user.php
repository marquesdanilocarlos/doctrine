<?php

use App\Entities\User;
use App\Helper\EntityManagerCreator;

require __DIR__ . "/vendor/autoload.php";

$em = EntityManagerCreator::createEntityManager();


$user = new User();
$user->setName("Joventino");

$em->persist($user);

//var_dump($em->getUnitOfWork()->getEntityState($user));
//exit;

$em->flush();