<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('description')
        ->add('submit', SubmitType::class, array('label' => 'Commenter'))
        ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
          'data_class' => Comment::class,
      ));
    }
}

