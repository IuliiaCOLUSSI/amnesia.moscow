<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class WebsiteManagementFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('mainBackgroundFile', VichImageType::class, [
            'label' => 'З агрузите фото основного фона сайта',
            'required' => false,
            'allow_delete' => true,
            'data_class' => null,
             'attr' => [
            //'class' => 'form-control-file custom-file-input mb-5', 'id' => 'formControlFile2', 'placeholder' => 'Загрузите фото не более 2mb'],
            'class' => 'mb-5', 'id' => 'formControlFile2', 'placeholder' => 'Загрузите фото не более 2mb'],
        ]);
    }

}
