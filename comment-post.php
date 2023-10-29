<?php

use App\Entities\Comment;
use App\Entities\Post;
use App\Helper\EntityManagerCreator;

require __DIR__ . '/vendor/autoload.php';

$em = EntityManagerCreator::createEntityManager();

/*$comment = $em->find(Comment::class, 2);

echo "Comentário {$comment->getId()} - {$comment->getMessage()}";

var_dump($comment->getPost()->getId(), $comment->getPost()->getTitle(), $comment->getPost()->getContent());*/

$post = $em->find(Post::class, 1);
//var_dump($post->getComments()->toArray());

$comment1 = new Comment();
$comment1->setMessage("Comentário 4 do Post");
$em->persist($comment1);

$post->addComment($comment1);

$em->flush($post);
