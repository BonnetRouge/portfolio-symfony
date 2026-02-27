<?php

namespace App\Form;

use App\Entity\Plat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Positive;

class PlatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prix', NumberType::class, [
                'label' => 'Prix (€)',
                'scale' => 2,
                'constraints' => [
                    new Positive(message: 'Le prix doit être positif.')
                ]
            ])
            ->add('categorie', ChoiceType::class, [
                'label' => 'Catégorie',
                'choices' => [
                    '🥗 Entrée'        => 'entree',
                    '🍖 Plat principal' => 'plat',
                    '🍰 Dessert'        => 'dessert',
                ],
            ])
            ->add('icone', ChoiceType::class, [
                'label' => 'Icône',
                'choices' => [
                    '🥗 Salade'         => '🥗',
                    '🍜 Soupe'          => '🍜',
                    '🥩 Viande'         => '🥩',
                    '🍖 Grillades'      => '🍖',
                    '🐟 Poisson'        => '🐟',
                    '🍣 Sushi'          => '🍣',
                    '🍕 Pizza'          => '🍕',
                    '🍝 Pâtes'          => '🍝',
                    '🍛 Curry'          => '🍛',
                    '🥘 Mijoté'         => '🥘',
                    '🍰 Gâteau'         => '🍰',
                    '🍮 Flan'           => '🍮',
                    '🍦 Glace'          => '🍦',
                    '🍫 Chocolat'       => '🍫',
                    '🥧 Tarte'          => '🥧',
                    '🍓 Fruits'         => '🍓',
                ],
            ])
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plat::class,
        ]);
    }
}