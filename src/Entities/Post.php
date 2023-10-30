<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\PersistentCollection;

#[Entity]
#[Table(name: "posts")]
class Post
{

    #[Id, Column(type: "integer"), GeneratedValue(strategy: "IDENTITY")]
    private int $id;
    #[Column(type: "string")]
    private string $title;

    #[Column(type: "text")]
    private string $content;

    #[OneToMany(targetEntity: Comment::class, mappedBy: "post")]
    private PersistentCollection $comments;

    #[ManyToMany(targetEntity: Category::class)]
    private PersistentCollection $categories;

    #[OneToOne(targetEntity: Detail::class)]
    private Detail $detail;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getComments(): PersistentCollection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment)
    {
        $comment->setPost($this);
        $this->comments->add($comment);
    }

    public function getCategories(): PersistentCollection
    {
        return $this->categories;
    }

    public function setCategories(PersistentCollection $categories)
    {
        $this->categories = $categories;
    }

    public function addCategory(Category $category): void
    {
        $this->categories->add($category);
    }

    public function getDetail(): Detail
    {
        return $this->detail;
    }

    public function setDetail(Detail $detail): void
    {
        $this->detail = $detail;
    }
}