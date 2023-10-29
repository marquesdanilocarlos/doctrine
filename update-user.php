<?php

use App\Entities\User;
use App\Helper\EntityManagerCreator;

require __DIR__ . "/vendor/autoload.php";

$em = EntityManagerCreator::createEntityManager();

$user = $em->find(User::class, 1);
$user->setName("Danilo Marques");

//var_dump($em->getUnitOfWork()->getEntityState($user));

$em->detach($user);

var_dump($em->getUnitOfWork()->getEntityState($user));
$em->flush($user);