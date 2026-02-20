<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MusiqueController extends AbstractController
{
    private function getCours(): array
    {
        return [
            [
                'id' => 1,
                'titre' => 'Introduction au piano',
                'duree' => '15min',
                'niveau' => 'Débutant',
                'icone' => '🎹',
                'description' => 'Découvre les bases du piano : position des mains, les touches et tes premiers accords.',
                'objectifs' => [
                    'Connaître la disposition des touches',
                    'Poser correctement ses mains',
                    'Jouer une gamme simple',
                ],
            ],
            [
                'id' => 2,
                'titre' => 'Les accords de base',
                'duree' => '20min',
                'niveau' => 'Débutant',
                'icone' => '🎸',
                'description' => 'Apprends les accords fondamentaux Do, Ré, Mi, Fa, Sol, La, Si et enchaîne-les.',
                'objectifs' => [
                    'Maîtriser les 7 accords de base',
                    'Enchaîner les accords sans pause',
                    'Lire une grille d\'accords simple',
                ],
            ],
            [
                'id' => 3,
                'titre' => 'Le solfège simplifié',
                'duree' => '25min',
                'niveau' => 'Intermédiaire',
                'icone' => '🎼',
                'description' => 'Comprends la lecture de partitions, les rythmes et les silences.',
                'objectifs' => [
                    'Lire une partition simple',
                    'Reconnaître les figures de notes',
                    'Compter les temps correctement',
                ],
            ],
            [
                'id' => 4,
                'titre' => 'Improvisation jazz',
                'duree' => '30min',
                'niveau' => 'Avancé',
                'icone' => '🎷',
                'description' => 'Explore les bases de l\'improvisation jazz : gammes pentatoniques et blue notes.',
                'objectifs' => [
                    'Maîtriser la gamme pentatonique',
                    'Improviser sur une grille jazz',
                    'Utiliser les blue notes',
                ],
            ],
        ];
    }

    #[Route('/demo/musique', name: 'app_demo_musique')]
    public function index(): Response
    {
        return $this->render('musique/index.html.twig', [
            'cours' => $this->getCours(),
        ]);
    }

    #[Route('/demo/musique/cours/{id}', name: 'app_demo_musique_cours')]
    public function cours(int $id): Response
    {
        $allCours = $this->getCours();
        $cours = null;
        foreach ($allCours as $c) {
            if ($c['id'] === $id) {
                $cours = $c;
                break;
            }
        }

        if (!$cours) {
            throw $this->createNotFoundException('Cours introuvable.');
        }

        return $this->render('musique/cours.html.twig', [
            'cours' => $cours,
            'totalCours' => count($allCours),
        ]);
    }

    #[Route('/demo/musique/progression', name: 'app_demo_musique_progression')]
    public function progression(): Response
    {
        return $this->render('musique/progression.html.twig', [
            'cours' => $this->getCours(),
        ]);
    }
}