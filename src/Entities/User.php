<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Colmun(type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;
    /**
     * @ORM\Colmun(type="string")
     */
    private string $name;

}