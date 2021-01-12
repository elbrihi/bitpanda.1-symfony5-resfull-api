<?php

namespace App\Service ;

use Doctrine\ORM\EntityManagerInterface;

class UserManager
{
    private $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    )
    {
        $this->entityManager =  $entityManager ;
    }

    public function getUsers()
    {
        return $this->entityManager->getRepository('App\Entity\Users')->findAll() ;
    }
}


?>