<?php

namespace App\Form;

use App\Entity\Purchase;

use App\Form\UserFormType;
use App\Form\DeliveryFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PurchaseFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comment', TextareaType::class, [
                 'required' => false,
                'attr' => [
                    'class' => 'form-control fields-login',
                ],
            ])
            ->add('author', CollectionType::class, [
                'entry_type' => UserFormType::class,
                'prototype' => true,
                'label' => false,
                'allow_add' => true,
                'required' => false
            ])
            ->add('deliveryInformation', CollectionType::class, [
                'entry_type' => DeliveryFormType::class,
                'prototype' => true,
                'label' => false,
                'allow_add' => true,
                'required' => false
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Purchase::class,
        ));
    }

}
