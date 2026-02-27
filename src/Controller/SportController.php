<?php

namespace App\Controller;

use App\Repository\SportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SportController extends AbstractController
{
    #[Route('/demo/sport', name: 'app_demo_sport')]
    public function index(SportRepository $sportRepository): Response
    {
        $sports = $sportRepository->findAll();

        return $this->render('sport/index.html.twig', [
            'sports' => $sports,
        ]);
    }

    #[Route('/demo/sport/partenaires', name: 'app_demo_sport_partenaires')]
    public function partenaires(): Response
    {
        $partenaires = [
            ['id' => 1, 'nom' => 'Marie D.',   'sport' => 'Course à pied', 'niveau' => 'Intermédiaire', 'avatar' => '👩'],
            ['id' => 2, 'nom' => 'Thomas L.',  'sport' => 'Natation',      'niveau' => 'Avancé',        'avatar' => '👨'],
            ['id' => 3, 'nom' => 'Julie M.',   'sport' => 'Vélo',          'niveau' => 'Débutant',      'avatar' => '👩'],
            ['id' => 4, 'nom' => 'Alex R.',    'sport' => 'Football',      'niveau' => 'Intermédiaire', 'avatar' => '🧑'],
            ['id' => 5, 'nom' => 'Sophie K.',  'sport' => 'Yoga',          'niveau' => 'Débutant',      'avatar' => '👩'],
        ];

        return $this->render('sport/partenaires.html.twig', [
            'partenaires' => $partenaires,
        ]);
    }
}