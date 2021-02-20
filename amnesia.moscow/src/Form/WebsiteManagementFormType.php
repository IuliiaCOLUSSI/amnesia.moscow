<?php

namespace App\Form;

use App\Entity\Category;
use App\Form\PartnerFormType;
use App\Form\CategoryFormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class WebsiteManagementFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('mainBackgroundImageFile', VichImageType::class, [
            'label' => 'Загрузите фото основного фона сайта',
            'required' => false,
            'allow_delete' => true,
            'data_class' => null,
             //'attr' => [
            //'class' => 'form-control-file custom-file-input mb-5', 'id' => 'formControlFile2', 'placeholder' => 'Загрузите фото не более 2mb'],
            //'class' => 'mb-5', 'id' => 'formControlFile2', 'placeholder' => 'Загрузите фото не более 2 мб'],
       // ]);
       ])
       ->add('aboutUsBackgroundImageFile', VichImageType::class, [
        'label' => 'Загрузите фото фона блока "О нас"',
        'required' => false,
        'allow_delete' => true,
        'data_class' => null,
         //'attr' => [
        //'class' => 'form-control-file custom-file-input mb-5', 'id' => 'formControlFile2', 'placeholder' => 'Загрузите фото не более 2mb'],
        //'class' => 'mb-5', 'id' => 'formControlFile2', 'placeholder' => 'Загрузите фото не более 2 мб'],
   // ]);
   ])
      /*->add('catalogCategory', CollectionType::class, [
                  'entry_type' => CatalogCategoryFormType::class,
                  'prototype' => true,
                  'label' => false,
                  'allow_add' => true,
                  'required' => false
              ])*/
        ->add('partners', CollectionType::class, [
            'entry_type' => PartnerFormType::class,
            'prototype' => true,
            'label' => false,
            'allow_add' => true,
            'required' => false
        ]);
    }
}
