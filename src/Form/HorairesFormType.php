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
                'placeholder' => '12h',
                ]
            ])
            ->add('ferm_midi', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto',
                'placeholder' => '15h',
                ]
            ])
            ->add('ouv_soir', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto',
                'placeholder' => '19h',
                ]
            ])
            ->add('ferm_soir', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto',
                'placeholder' => '22h',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Restaurant::class,
            'method' => 'PUT',
        ]);
    }
}
