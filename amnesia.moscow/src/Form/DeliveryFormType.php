<?php

namespace App\Form;

use App\Entity\DeliveryInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DeliveryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address', TextType::class, [
                'attr' => [
                    'class' => 'form-control fields-login'
                ]
            ])
            ->add('dateDelivery', DateType::class, [
                 'required' => false,
                'attr' => [
                    'class' => 'form-control fields-login',
                ],
         
            ])
            ->add('dateDelivery', TimeType::class, [
                'required' => false,
               'attr' => [
                   'class' => 'form-control fields-login',
               ],
        
           ])
           ->add('recipientName', TextType::class, [
            'required' => false,
           'attr' => [
               'class' => 'form-control fields-login',
           ],
    
            ])
            ->add('recipientPhoneNumber', TextType::class, [
                'required' => false,
               'attr' => [
                   'class' => 'form-control fields-login',
               ],
        
        ]);
    }

}
