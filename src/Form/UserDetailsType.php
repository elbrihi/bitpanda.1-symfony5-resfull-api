<?php 

namespace App\Form;

use App\Entity\UserDetails;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('phoneNumber')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
       

        $resolver->setDefaults([
            'data_class' => 'App\Entity\UserDetails',
            'csrf_protection' => false
        ]);
    }
}


?>