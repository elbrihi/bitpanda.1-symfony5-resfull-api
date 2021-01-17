<?php

namespace App\Service ;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UsersRepository;

class UserManager
{
    private $entityManager;

    private $users_repository;

    public function __construct(
        EntityManagerInterface $entityManager,
        UsersRepository $users_repository
    )
    {
        $this->entityManager =  $entityManager ;
        $this->users_repository = $users_repository ;
    }

    public function getUsers()
    {
        return $this->entityManager->getRepository('App\Entity\Users')->findAll();
    }

    public function getActiveAustriansUsers()
    {
        return $this->users_repository->getActiveAustriansUsers();
    }
}


?>