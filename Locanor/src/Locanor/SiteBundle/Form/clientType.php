<?php

namespace Locanor\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class clientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
       ->add('titre',   ChoiceType::class, array(
          'choices' => array(
            'M' => 'Monsieur',
            'Mme' => 'Madame',
            'Mlle' => 'Mademoiselle'),
          'required' => true,
          'empty_data' => null ))

        ->add('name',    TextType::class)
        ->add('prenom',    TextType::class)
        ->add('datedenaissance',     DateType::class)
        ->add('adresse',    TextType::class)
        ->add('codepostal',    TextType::class)
        ->add('ville',    TextType::class)
        ->add('pays',    TextType::class)
        ->add('telephone',    TextType::class)
        ->add('email',    TextType::class)
        ->add('save',    SubmitType::class);


    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Locanor\SiteBundle\Entity\client'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'locanor_sitebundle_client';
    }

}
