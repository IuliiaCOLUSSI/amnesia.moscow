<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstName', TextType::class, [
            'attr' => [
                'class' => 'form-control fields-login',
                'placeholder' => ''
            ],
        ])
        ->add('lastName', TextType::class, [
            'attr' => [
                'class' => 'form-control fields-login',
                'placeholder' => ''
            ],
        ])
        ->add('phoneNumber', TextType::class, [
            'attr' => [
                'class' => 'form-control fields-login',
                'placeholder' => ''
            ],
        ])
        ->add('email', TextType::class, [
            'attr' => [
                'class' => 'form-control fields-login',
                'placeholder' => ''
            ],
        ])
        ->add('isAgreeConditionsOfUse', CheckboxType::class, [
            'attr' => [
                'class' => 'form-check-input'
            ],
        ])
        ->add('deliveryInformation', CollectionType::class, [
            'entry_type' => DeliveryFormType::class,
            'prototype' => true,
            'label' => false,
            'allow_add' => true,
            'required' => false
        ])
        ->add('purchases', CollectionType::class, [
            'entry_type' => PurchaseFormType::class,
            'prototype' => true,
            'label' => false,
            'allow_add' => true,
            'required' => false
        ])
        ->add('userQuestions', CollectionType::class, [
            'entry_type' => UserQuestionFormType::class,
            'prototype' => true,
            'label' => false,
            'allow_add' => true,
            'required' => false
        ]);
    }

    
}