<?php

use App\Entities\Category;
use App\Entities\Comment;
use App\Entities\Detail;
use App\Entities\Post;
use App\Helper\EntityManagerCreator;
use Doctrine\ORM\PersistentCollection;

require __DIR__ . '/vendor/autoload.php';

$em = EntityManagerCreator::createEntityManager();

$post = $em->find(Post::class, 1);

/*$detail = new Detail();
$detail->setStatus('published');
$detail->setVisibility('public');
$em->persist($detail);

$post->setDetail($detail);
$em->flush($post);*/

var_dump($post->getDetail()->getStatus(), $post->getDetail()->getVisibility());