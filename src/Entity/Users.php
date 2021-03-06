<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use DateTimeInterface;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(columnDefinition="TINYINT NOT NULL", length=1)
     */
    private $active;

    /**
     * @ORM\Column(columnDefinition="TIMESTAMP NULL DEFAULT NULL", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(columnDefinition="TIMESTAMP NULL DEFAULT NULL", nullable=true)
     */
    private $updated_at;

    /**
     * 
     * @ORM\OneToOne(targetEntity="App\Entity\UserDetails",  mappedBy="user")
     */
    private $user_details ; 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(int $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt( $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    
}
