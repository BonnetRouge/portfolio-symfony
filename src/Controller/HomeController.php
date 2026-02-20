<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }

    #[Route('/hello/{name}', name: 'app_hello')]
    public function hello(string $name = "Symfony"): Response
    {
        return $this->render('home/hello.html.twig', ['name' => ucfirst($name),]);
    }

    #[Route('/random', name: 'app_random')]
    public function random(): Response
    {
        $quotes = [
            'Le code est poésie.',
            'Symfony simplifie la complexité.',
            'Toujours tester, jamais supposer.',
            'Refactoriser, c\'est aimer son futur soi.'
        ];

        $randomQuote = $quotes[array_rand($quotes)];

        return $this->render('home/random.html.twig', ['quote' => $randomQuote,]);
    }

    #[Route('/api/random', name: 'app_api_random')]
    public function apiRandom(): JsonResponse
    {
        $quotes = [
            'Le code est poésie.',
            'Symfony simplifie la complexité.',
            'Toujours tester, jamais supposer.',
            'Refactoriser, c\'est aimer son futur soi.'
        ];

        $randomQuote = $quotes[array_rand($quotes)];

        return new JsonResponse([
            'citation' => $randomQuote
        ]);
    }

    #[Route('/redirect', name: 'app_redirect')]
    public function goToRandom(): Response
    {
        return $this->redirectToRoute('app_random');
    }

    #[Route('/error', name: 'app_error')]
    public function error(): Response
    {
        throw $this->createNotFoundException('Oups ! Cette page est introuvable.');
    }

    #[Route('/projets/{category}', name: 'app_projet_detail')]
    public function projetDetail(string $category): Response
    {
        $allProjets = [
            'restaurant' => [
                'title' => 'Site de Restaurant',
                'description' => 'Un site élégant pour un restaurant proposant des entrées, des plats principaux et des desserts',
                'longDescription' => 'Ce projet est un site web complet pour un restaurant haut de gamme. Il comprend un système de réservation en ligne, une galerie photos. Le design est responsive et optimisé pour tous les appareils.',
                'image' => 'restaurant.jpg',
                'technologies' => ' Css, Symfony, Bootstrap, twig',
                'features' => [
                    'Menu par catégorie',
                    'Système de réservation en ligne',
                    'Design élégant et moderne'
                ],
                'category' => 'restaurant',
                'demoUrl' => 'app_demo_restaurant',
                'isDemoRoute' => true
            ],
            'sport' => [
                'title' => 'Site de Sport',
                'description' => 'Plateforme sportive permettant de suivre ses performances et de trouver des partenaires d\'entraînement.',
                'longDescription' => 'Application web dédiée aux sportifs souhaitant suivre leurs performances, partager leurs exploits et trouver des partenaires d\'entraînement. Inclut un système de tableau de bord personnalisé, des statistiques détaillées et un réseau social sportif.',
                'image' => 'sport.jpg',
                'technologies' => 'Css, Symfony, Bootstrap, twig',
                'features' => [
                    'Tableau de bord personnalisé',
                    'Suivi des performances',
                    'Recherche de partenaires',
                    'Statistiques détaillées'
                ],
                'category' => 'sport',
                'demoUrl' => 'app_demo_sport',
                'isDemoRoute' => true
            ],
            'musique' => [
                'title' => 'Site d\'Apprentissage Musical',
                'description' => 'Application web pour apprendre la musique avec des cours et un système de progression.',
                'longDescription' => 'Plateforme d\'apprentissage musical proposant des cours structurés, des exercices pratiques et un système de suivi de progression. Les utilisateurs peuvent apprendre à leur rythme avec des leçons.',
                'image' => 'musique.jpg',
                'technologies' => 'Css, Symfony, Bootstrap, twig',
                'features' => [
                    'Cours structurés',
                    'Système de progression',
                    'Exercices pratiques',
                    'Suivi personnalisé'
                ],
                'category' => 'musique',
                'demoUrl' => 'app_demo_musique',
                'isDemoRoute' => true
            ]
        ];

        if (!isset($allProjets[$category])) {
            throw $this->createNotFoundException('Ce projet n\'existe pas.');
        }

        $projet = $allProjets[$category];

        return $this->render('home/projet_detail.html.twig', [
            'projet' => $projet
        ]);
    }

    #[Route('/projets', name: 'app_projets')]
    public function projets(): Response
    {
        $projets = [
            [
                'title' => 'Site de Restaurant',
                'description' => 'Un site élégant pour un restaurant gastronomique avec menu interactif et système de réservation.',
                'image' => 'restaurant.jpg',
                'technologies' => 'CSS, JavaScript, PHP, Symfony',
                'category' => 'restaurant'
            ],
            [
                'title' => 'Site de Sport',
                'description' => 'Plateforme sportive permettant de suivre ses performances et de trouver des partenaires d\'entraînement.',
                'image' => 'sport.jpg',
                'technologies' => 'Symfony, Bootstrap',
                'category' => 'sport'
            ],
            [
                'title' => 'Site d\'Apprentissage Musical',
                'description' => 'Application web pour apprendre la musique avec des cours interactifs et un système de progression.',
                'image' => 'musique.jpg',
                'technologies' => 'Css, symphony, PHP',
                'category' => 'musique'
            ]
        ];

        return $this->render('home/projets.html.twig', [
            'projets' => $projets
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig');
    }
}