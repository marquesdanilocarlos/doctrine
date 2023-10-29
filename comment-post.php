<?php

use App\Entities\Comment;
use App\Entities\Post;
use App\Helper\EntityManagerCreator;

require __DIR__ . '/vendor/autoload.php';

$em = EntityManagerCreator::createEntityManager();

$comment = $em->find(Comment::class, 2);

echo "Comentário {$comment->getId()} - {$comment->getMessage()}";

var_dump($comment->getPost()->getId(), $comment->getPost()->getTitle(), $comment->getPost()->getContent());
