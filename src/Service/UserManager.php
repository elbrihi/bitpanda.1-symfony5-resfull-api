<?php

namespace App\Service ;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UsersRepository;

class UserManager
{
    private $entityManager;

    private $users_repository;

     /**
     * UserManager constructor.
     * 
     * @param EntityManagerInterface  $entityManager
     * 
     * @param UsersRepository $users_repositor
     * 
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        UsersRepository $users_repository
    )
    {
        $this->entityManager =  $entityManager ;
        $this->users_repository = $users_repository ;
    }

   
    /**
     * return array
     * 
     * return all the users which are `active` (users table) and have an Austrian citizenship.
     */

    public function getActiveAustriansUsers():array
    {
        return $this->users_repository->getActiveAustriansUsers();
    }

    public function getUsers()
    {
        return $this->entityManager->getRepository('App\Entity\Users')->findAll();
    }

     
}


?>