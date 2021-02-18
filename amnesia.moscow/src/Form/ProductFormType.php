<?php

namespace App\Form;


use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
                'required' => false,
            ])
            ->add('smallDescription', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
                'required' => false,
            ])
            ->add('reference', TextType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
            ])
            ->add('price', NumberType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
            ])
            ->add('newPrice', NumberType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
            ])
            ->add('color', TextType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
            ])
            ->add('shape', TextType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
            ])
            ->add('inStock', NumberType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
            'required' => false,
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Основное фото товара',
                'required' => false,
                'allow_delete' => true,
                'data_class' => null,
                 'attr' => [
                'class' => 'mb-5', 'id' => 'formControlFile2', 'placeholder' => 'Загрузите фото не более 2mb'],
            ])
           /* ->add('images', FileType::class, [
                'label' => 'Дополнительные фото товара',
                'multiple' => true,
                'mapped' => false,
                'required' => false,
                'data_class' => null,
            ]);*/
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => 'Выберете категорию'
                ],
                'choice_label' => function ($category) {
                    return $category->getTitle();
                },

                'required' => false
            ])
            ->add('titleEng', TextType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
            ])
            ->add('descriptionEng', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
                'required' => false,
            ])
            ->add('smallDescriptionEng', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
                'required' => false,
            ])
            ->add('priceDollar', NumberType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
            ])
            ->add('newPriceEng', NumberType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
            ])
            ->add('colorEng', TextType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
            ])
            ->add('shapeEng', TextType::class, [
                'attr' => [
                    'class' => 'form-control fields-login',
                    'placeholder' => ''
                ],
            ]);
    }

}
