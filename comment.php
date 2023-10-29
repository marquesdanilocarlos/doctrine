<?php

use App\Entities\Comment;
use App\Entities\Post;
use App\Helper\EntityManagerCreator;

require __DIR__ . '/vendor/autoload.php';

$em = EntityManagerCreator::createEntityManager();

$post = new Post();
$post->setTitle('Meu primeiro Post');
$post->setContent('Conteúdo do meu primeiro Post');
$em->persist($post);

$comment1 = new Comment();
$comment1->setMessage("Comentário 1 do Post");
$comment1->setPost($post);

$comment2 = new Comment();
$comment2->setMessage("Comentário 2 do Post");
$comment2->setPost($post);

$em->persist($comment1);
$em->persist($comment2);

$em->flush();
