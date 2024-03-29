<?php

namespace App\Form;

use App\Entity\Restaurant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HorairesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ouv_midi', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto',
                ]
            ])
            ->add('ferm_midi', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto',
                ]
            ])
            ->add('ouv_soir', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto',
                ]
            ])
            ->add('ferm_soir', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Restaurant::class,
        ]);
    }
}
