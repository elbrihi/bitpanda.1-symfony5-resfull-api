<?php 

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormFactoryInterface ;
use App\Repository\UserDetailsRepository;
use App\Form\UserDetailsType;


use App\Entity\UserDetails ;

class UserDetailsManager
{
    private $entityManager ;
    private $form_factory ;
    private $users_details_repository;
    public function __construct(
        EntityManagerInterface $entityManager,
        FormFactoryInterface $form_factory,
        UserDetailsRepository $users_details_repository
    )
    {
        $this->entityManager = $entityManager ;
        $this->form_factory = $form_factory;
        $this->users_details_repository =  $users_details_repository ;
    }

    public function updateUserDetails($id_users_details, $request)
    {
        $userDetails = new UserDetails();

        $user_details =  $this->entityManager->getRepository('App:UserDetails')
                         ->find($id_users_details);
        
        $user =  $this->entityManager->getRepository('App:Users')->find($request->request->get('user_id'));
        
        $countries =  $this->entityManager->getRepository('App:Countries')
                      ->find($request->request->get('citizenship_country_id'));
        
        
        if (empty($user_details )) {
            return $this->userDetailsNotFound();
        }
        $user_details->setCountries($countries) ;
        $user_details ;

        $form = $this->form_factory->create(UserDetailsType::class, $user_details);     

        $form->submit($request->request->all(),false); 

        if ($form->isValid()) {
            
            $user_details->setUser($user) ;

            $user_details->setCountries($countries) ;
            
            $this->entityManager->merge($user_details);
           
            $this->entityManager->flush();
           
            return $user_details;

        } else {
            return $form;
        }
    }

    public function deleteUser($user_id)
    {
        $user =  $this->entityManager->getRepository('App:Users')
                        ->find($user_id);
        //return $user ;
        $user_details =  $this->entityManager->getRepository('App:UserDetails')
                        ->findOneBy(['user' => $user ]);

        if (!empty($user_details )) {
            return 'exist';

            //return $this->userDetailsNotFound();
            return \FOS\RestBundle\View\View::create(['message' => 'UserDetails exit'], Response::HTTP_NOT_FOUND);
        }

        $this->entityManager->remove($user);

        $this->entityManager->flush();
        
    }
    private function userDetailsNotFound()
    {
        return \FOS\RestBundle\View\View::create(['message' => 'UserDetails not found'], Response::HTTP_NOT_FOUND);
    }
    

    /*
       
    public function deleteUser($id_users_details)
    {


        $user_details =  $this->entityManager->getRepository('App:UserDetails')
        ->find($id_users_details);

        if (empty($user_details )) {
            return $this->userDetailsNotFound();
        }

        $this->entity_manager->remove($user_details->getUser());
        $this->entity_manager->flush();
        
        // $this->users_details_repository->findUserDetailByUserId($id_users_details)  ;
    }
     */
}