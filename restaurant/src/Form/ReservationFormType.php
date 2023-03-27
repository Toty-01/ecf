<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto'
                ]
            ])
            ->add('couverts', options: [
                'attr' => [
                'min' => 1, 
                'max' => 20,
                'class' => 'form-control w-75 mx-auto',
                ]
            ])
            ->add('date', options: [
                'widget' => 'single_text',
                'attr' => [
                'class' => 'form-control w-75 mx-auto'
                ]
            ])
            ->add('heure', TimeType::class, [
                'widget' => 'choice',
                'hours' => [12, 13, 19, 20],
                'minutes' => range(0, 45, 15),
                'attr' => [
                'class' => 'form-control w-75 mx-auto'
                ],
            ])
            ->add('allergie', options: [
                'attr' => [
                'class' => 'form-control w-75 mx-auto'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
