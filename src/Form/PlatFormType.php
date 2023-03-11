<?php

namespace App\Form;

use App\Entity\Plat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlatFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto'
                ]
            ])
            ->add('prix', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto'
                ]
            ])
            ->add('description', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto'
                ]
            ])
            ->add('ingredients', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plat::class,
        ]);
    }
}
