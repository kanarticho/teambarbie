<?php

namespace App\Form;

use App\Entity\Mood;
use App\Entity\Moodday;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MooddayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mood', EntityType::class, [
                'class' => Mood::class,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => false,
                'by_reference' => false,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Moodday::class,
        ]);
    }
}
