<?php

namespace App\Entities;

use App\Repositories\UserRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: UserRepository::class, readOnly: false)]
#[Table(name: "users")]
class User
{
    #[Id, Column(type: "integer"), GeneratedValue(strategy: "IDENTITY")]
    private int $id;
    #[Column(type: "string")]
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}