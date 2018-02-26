<?php

namespace TutoBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class noteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('note',NumberType::class ,array('attr'=>array('class'=>'form-control')))
                ->add('etudiant',EntityType::class,array('class'=>'TutoBundle:etudiant',
                      'choice_label'=>'nom',
                      'attr'=>array('class'=>'form-control')))
                ->add('matiere',EntityType::class,array('class'=>'TutoBundle:matiere',
                       'choice_label'=>'nomMatiere',
                    'attr'=>array('class'=>'form-control')));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TutoBundle\Entity\note'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tutobundle_note';
    }


}
