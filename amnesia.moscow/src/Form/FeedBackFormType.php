<?php

namespace App\Form;

use App\Entity\FeedBack;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FeedBackFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control fields-login'
                ]
            ])
            ->add('description', TextareaType::class, [
                 'required' => false,
                'attr' => [
                    'class' => 'form-control fields-login',
                ],
         
            ])
            ->add('titleEng', TextType::class, [
                'attr' => [
                    'class' => 'form-control fields-login'
                ]
            ])
            ->add('descriptionEng', TextareaType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control fields-login',
                ],

            ])
            ->add('author', TextType::class, [
                'attr' => [
                    'class' => 'form-control fields-login'
                ]
            ])
            ->add('authorEng', TextType::class, [
                'attr' => [
                    'class' => 'form-control fields-login'
                ]
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => FeedBack::class,
        ));
    }

}
