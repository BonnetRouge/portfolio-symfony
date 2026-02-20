<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RestaurantController extends AbstractController
{
    #[Route('/demo/restaurant', name: 'app_demo_restaurant')]
    public function index(): Response
    {
        $menu = [
            'entrees' => [
                ['nom' => 'Salade César', 'prix' => 12.50],
                ['nom' => 'Soupe à l\'oignon', 'prix' => 8.00],
                ['nom' => 'Carpaccio de boeuf', 'prix' => 14.00],
            ],
            'plats' => [
                ['nom' => 'Steak frites', 'prix' => 22.00],
                ['nom' => 'Saumon grillé', 'prix' => 25.00],
                ['nom' => 'Risotto aux champignons', 'prix' => 18.00],
            ],
            'desserts' => [
                ['nom' => 'Tiramisu', 'prix' => 7.50],
                ['nom' => 'Tarte tatin', 'prix' => 8.00],
                ['nom' => 'Crème brûlée', 'prix' => 7.00],
            ]
        ];

        return $this->render('restaurant/index.html.twig', [
            'menu' => $menu,
        ]);
    }

    #[Route('/demo/restaurant/reservation', name: 'app_demo_restaurant_reservation')]
    public function reservation(): Response
    {
        return $this->render('restaurant/reservation.html.twig');
    }
}