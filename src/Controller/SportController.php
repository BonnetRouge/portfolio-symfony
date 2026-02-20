<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SportController extends AbstractController
{
    #[Route('/demo/sport', name: 'app_demo_sport')]
    public function index(): Response
    {
        $sports = [
            ['id' => 1,  'nom' => 'Football',      'icone' => '⚽', 'description' => 'Match complet 90min',              'niveau' => 'Intermédiaire'],
            ['id' => 2,  'nom' => 'Basketball',     'icone' => '🏀', 'description' => 'Match 4x10min',                    'niveau' => 'Intermédiaire'],
            ['id' => 3,  'nom' => 'Rugby',          'icone' => '🏉', 'description' => 'Match complet 80min',              'niveau' => 'Avancé'],
            ['id' => 4,  'nom' => 'Volleyball',     'icone' => '🏐', 'description' => 'Match en 3 sets',                  'niveau' => 'Débutant'],
            ['id' => 5,  'nom' => 'Handball',       'icone' => '🤾', 'description' => 'Match complet 60min',              'niveau' => 'Intermédiaire'],
            ['id' => 6,  'nom' => 'Hockey',         'icone' => '🏒', 'description' => 'Match complet 60min',              'niveau' => 'Avancé'],
            ['id' => 7,  'nom' => 'Tennis',         'icone' => '🎾', 'description' => 'Match en 2 sets gagnants',         'niveau' => 'Intermédiaire'],
            ['id' => 8,  'nom' => 'Padel',          'icone' => '🏓', 'description' => 'Match en 2 sets gagnants',         'niveau' => 'Débutant'],
            ['id' => 9,  'nom' => 'Badminton',      'icone' => '🏸', 'description' => 'Match en 2 sets gagnants',         'niveau' => 'Débutant'],
            ['id' => 10, 'nom' => 'Squash',         'icone' => '🎱', 'description' => 'Match en 3 sets',                  'niveau' => 'Intermédiaire'],
            ['id' => 11, 'nom' => 'Natation',       'icone' => '🏊', 'description' => 'Nager 1km sans s\'arrêter',        'niveau' => 'Intermédiaire'],
            ['id' => 12, 'nom' => 'Surf',           'icone' => '🏄', 'description' => 'Session de 1h en mer',             'niveau' => 'Avancé'],
            ['id' => 13, 'nom' => 'Aviron',         'icone' => '🚣', 'description' => 'Sortie de 10km sur l\'eau',        'niveau' => 'Intermédiaire'],
            ['id' => 14, 'nom' => 'Voile',          'icone' => '⛵', 'description' => 'Sortie en mer de 2h',              'niveau' => 'Intermédiaire'],
            ['id' => 15, 'nom' => 'Course à pied',  'icone' => '🏃', 'description' => 'Courir 5km en moins de 30min',    'niveau' => 'Débutant'],
            ['id' => 16, 'nom' => 'Cyclisme',       'icone' => '🚴', 'description' => 'Parcourir 40km',                   'niveau' => 'Intermédiaire'],
            ['id' => 17, 'nom' => 'VTT',            'icone' => '🚵', 'description' => 'Parcours de 20km en montagne',     'niveau' => 'Avancé'],
            ['id' => 18, 'nom' => 'Triathlon',      'icone' => '🏅', 'description' => 'Nage + vélo + course',             'niveau' => 'Avancé'],
            ['id' => 19, 'nom' => 'Gymnastique',    'icone' => '🤸', 'description' => 'Séance de 45min',                  'niveau' => 'Intermédiaire'],
            ['id' => 20, 'nom' => 'Musculation',    'icone' => '💪', 'description' => 'Programme 3x/semaine',             'niveau' => 'Débutant'],
            ['id' => 21, 'nom' => 'Escalade',       'icone' => '🧗', 'description' => 'Voie de 15m en autonomie',         'niveau' => 'Intermédiaire'],
            ['id' => 22, 'nom' => 'Skate',          'icone' => '🛹', 'description' => 'Session de 1h au skatepark',       'niveau' => 'Débutant'],
            ['id' => 23, 'nom' => 'Ski',            'icone' => '⛷️', 'description' => 'Journée complète sur les pistes',  'niveau' => 'Intermédiaire'],
            ['id' => 24, 'nom' => 'Snowboard',      'icone' => '🏂', 'description' => 'Journée complète sur les pistes',  'niveau' => 'Intermédiaire'],
            ['id' => 25, 'nom' => 'Boxe',           'icone' => '🥊', 'description' => 'Séance de sparring 1h',            'niveau' => 'Avancé'],
            ['id' => 26, 'nom' => 'Judo',           'icone' => '🥋', 'description' => 'Cours + randori 1h30',             'niveau' => 'Intermédiaire'],
            ['id' => 27, 'nom' => 'Karaté',         'icone' => '🥋', 'description' => 'Cours + kata 1h30',                'niveau' => 'Intermédiaire'],
            ['id' => 28, 'nom' => 'Escrime',        'icone' => '🤺', 'description' => 'Assaut complet 45min',             'niveau' => 'Avancé'],
        ];

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