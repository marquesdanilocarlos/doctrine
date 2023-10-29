<?php

use App\Entities\User;
use App\Helper\EntityManagerCreator;

require __DIR__ . "/vendor/autoload.php";

$em = EntityManagerCreator::createEntityManager();

$user = $em->find(User::class, 3);
$em->remove($user);

var_dump($em->getUnitOfWork()->getEntityState($user));
exit;

$em->flush();