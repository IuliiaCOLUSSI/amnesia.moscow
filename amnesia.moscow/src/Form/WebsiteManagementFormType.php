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
            'attr' => [
                'class' => 'form-control'],
       ])
       ->add('aboutUsBackgroundImageFile', VichImageType::class, [
        'label' => 'Загрузите фото фона блока "О нас"',
        'required' => false,
        'allow_delete' => true,
        'data_class' => null,
        'attr' => [
            'class' => 'form-control'],
   ])
      /*->add('catalogCategory', CollectionType::class, [
                  'entry_type' => CatalogCategoryFormType::class,
                  'prototype' => true,
                  'label' => false,
                  'allow_add' => true,
                  'required' => false
              ])*/
        ->add('announcements', CollectionType::class, [
                'entry_type' => AnnouncementFormType::class,
                'prototype' => true,
                'label' => false,
                'allow_add' => true,
                'required' => false
            ])
        ->add('partners', CollectionType::class, [
            'entry_type' => PartnerFormType::class,
            'prototype' => true,
            'label' => false,
            'allow_add' => true,
            'required' => false
        ]) 
        ->add('customSeasonalBlocks', CollectionType::class, [
            'entry_type' => CustomSeasonalBlockFormType::class,
            'prototype' => true,
            'label' => false,
            'allow_add' => true,
            'required' => false
        ])
        ->add('feedBacks', CollectionType::class, [
            'entry_type' => FeedBackFormType::class,
            'prototype' => true,
            'label' => false,
            'allow_add' => true,
            'required' => false
        ]);
    }
}
