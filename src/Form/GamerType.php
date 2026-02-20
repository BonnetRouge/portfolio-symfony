<?php

namespace App\Form;

use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('homeTeam', TextType::class, [
                'label' => 'Équipe à domicile',
                'attr' => ['placeholder' => 'Ex: Paris Saint-Germain']
            ])
            ->add('awayTeam', TextType::class, [
                'label' => 'Équipe à l\'extérieur',
                'attr' => ['placeholder' => 'Ex: Olympique de Marseille']
            ])
            ->add('date', DateType::class, [
                'label' => 'Date du game',
                /* 'widget' => 'single_text' */
            ])
            ->add('stadium', TextType::class, [
                'label' => 'Stade',
                'attr' => ['placeholder' => 'Ex: Parc des Princes']
            ])
            ->add('competition', ChoiceType::class, [
                'label' => 'Compétition',
                'choices' => [
                    'Ligue 1' => 'Ligue 1',
                    'Coupe de France' => 'Coupe de France',
                    'Ligue des Champions' => 'Ligue des Champions',
                    'Europa League' => 'Europa League'
                ],
                'placeholder' => 'Choisir une compétition'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
