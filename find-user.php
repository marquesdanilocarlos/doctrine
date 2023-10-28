<?php

use App\Entities\User;
use App\Helper\EntityManagerCreator;

require __DIR__ . "/vendor/autoload.php";

$em = EntityManagerCreator::createEntityManager();

$user = $em->find(User::class, 5);

echo $user->getId() . '<br/>';
echo $user->getName() . '<br/>';