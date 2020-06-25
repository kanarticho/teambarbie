<?php

namespace App\Form;

use App\Entity\Prescritpion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrescritpionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate')
            ->add('duration')
            ->add('morning')
            ->add('noon')
            ->add('evening')
            ->add('patient')
            ->add('medication')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Prescritpion::class,
        ]);
    }
}
