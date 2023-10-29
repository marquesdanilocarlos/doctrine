<?php

use App\Entities\Category;
use App\Entities\Comment;
use App\Entities\Post;
use App\Helper\EntityManagerCreator;
use Doctrine\ORM\PersistentCollection;

require __DIR__ . '/vendor/autoload.php';

$em = EntityManagerCreator::createEntityManager();

$post = $em->find(Post::class, 1);

$category = new Category();
$category->setName("Javascript");
$em->persist($category);

$post->addCategory($category);
$em->flush($post);


var_dump($post->getCategories()->getValues());