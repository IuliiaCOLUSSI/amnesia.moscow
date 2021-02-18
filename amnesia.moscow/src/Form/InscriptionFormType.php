<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class InscriptionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('firstName', TextType::class, [
            'attr' => [
                'class' => 'form-control fields-login',
                'placeholder' => ''
            ],
        ])
        ->add('lastName', NumberType::class, [
            'attr' => [
                'class' => 'form-control fields-login',
                'placeholder' => ''
            ],
        ])
        ->add('email', NumberType::class, [
            'attr' => [
                'class' => 'form-control fields-login',
                'placeholder' => ''
            ],
        ])
        ->add('roles', ChoiceType::class, [
            'choices' => [
            'Администратор' =>"Администратор",
            'Флорист' => "Флорист",
            ],
            'expanded' => true,
            'multiple' => false,
            ]);
    }

    
}