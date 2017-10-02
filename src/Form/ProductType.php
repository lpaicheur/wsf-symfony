<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('name')
        ->add('price')
        ->add('description', CKEditorType::class)
        ->add('category')
        ->add('image', FileType::class)
        ->add('submit', SubmitType::class)
        ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
          'data_class' => Product::class,
      ));
    }
}

