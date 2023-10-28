<?php

use App\Entities\User;
use App\Helper\EntityManagerCreator;

require __DIR__ . "/vendor/autoload.php";

$em = EntityManagerCreator::createEntityManager();

$user = new User();
$user->setName("Carlitos");

$em->persist($user);
$em->flush();