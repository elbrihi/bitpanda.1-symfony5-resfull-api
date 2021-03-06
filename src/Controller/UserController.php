<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use App\Service\UserManager ;

class UserController extends AbstractController
{
    private $user_manager ;

    
    public function __construct(UserManager $user_manager)
    {
        
        $this->user_manager = $user_manager ;
    }

    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

  

    /**
     * 
     * @Rest\View()
     * @Rest\Get("api/active_austrians_users",name="_active_austrians_users")
     */
    public function getActiveAustriansUsers()
    {
       // return $this->user_manager->getUsers() ;

        return $this->user_manager->getActiveAustriansUsers() ;
    }
}
