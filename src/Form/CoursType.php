<?php

namespace App\Form;

use App\Entity\Cours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\PositiveOrZero;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('duree', IntegerType::class, [
                'attr' => ['min' => 1],
                'label' => 'Durée (en minutes)',
                'constraints' => [
                    new PositiveOrZero(message: 'La durée ne peut pas être négative.')
                ]
            ])
            ->add('niveau', ChoiceType::class, [
                'choices' => [
                    'Débutant'      => 'Débutant',
                    'Intermédiaire' => 'Intermédiaire',
                    'Avancé'        => 'Avancé',
                ],
                'label' => 'Niveau',
            ])
            ->add('icone', ChoiceType::class, [
                'label' => 'Icône',
                'choices' => [
                    '🎹 Piano'         => '🎹',
                    '🎸 Guitare'       => '🎸',
                    '🎷 Saxophone'     => '🎷',
                    '🎺 Trompette'     => '🎺',
                    '🎻 Violon'        => '🎻',
                    '🥁 Batterie'      => '🥁',
                    '🎼 Solfège'       => '🎼',
                    '🎵 Musique'       => '🎵',
                    '🎶 Notes'         => '🎶',
                    '🎤 Chant'         => '🎤',
                    '🎧 Écoute'        => '🎧',
                    '🪗 Accordéon'     => '🪗',
                    '🪘 Djembé'        => '🪘',
                    '🪕 Banjo'         => '🪕',
                ],
                'attr' => ['style' => 'font-size: 1.2rem;'],
            ])
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}