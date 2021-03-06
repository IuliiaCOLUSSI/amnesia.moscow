<?php

namespace App\Form;

use App\Entity\CatalogCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CatalogCategoryFormType extends AbstractType
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
            ->add('mainImageFile', VichImageType::class, [
                'label' => 'Загрузите фото фона блока "Каталог"',
                'required' => false,
                'allow_delete' => true,
                'data_class' => null,
                'attr' => [
                    'class' => 'form-control'],
           ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CatalogCategory::class,
        ));
    }
}
