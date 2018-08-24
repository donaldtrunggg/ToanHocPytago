<?php

namespace AppBundle\Form;

use AppBundle\Entity\Blog;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlogType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('title', TextType::class)
      ->add('url', TextType::class)
      ->add('content', TextareaType::class, array('required' => false))
      ->add('status', ChoiceType::class, array(
        'choices' => array('Active' => 0, 'Inactive' => 1),
        'choices_as_values' => true
      ))
      ->add('save', SubmitType::class);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => Blog::class
    ));
  }
}