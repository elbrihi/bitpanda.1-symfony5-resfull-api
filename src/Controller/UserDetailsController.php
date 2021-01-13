<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\UserDetailsManager ;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;

/**
 * 
 * @Route("/api")
 */
class UserDetailsController extends AbstractController
{

    private $user_details_manager ;

    private $form_factory ;

    public function __construct(UserDetailsManager $user_details_manager)
    {
        $this->user_details_manager = $user_details_manager ;
    }
    
    /**
     * @Rest\View()
     * @Rest\Post("/users/details/update/{id_users_details}")
     */
    public function updateUserDetails(Request $request)
    {     
        return $this->user_details_manager->updateUserDetails($request->get('id_users_details'),$request) ;
    }
    
    /**
     * @Rest\View()
     * @Rest\Delete("/users/details/delete/{id_users_details}")
     */
    public function deleteUser(Request $request)
    {    
        return $this->user_details_manager->deleteUser($request->get('id_users_details')) ;
    }


    
}
