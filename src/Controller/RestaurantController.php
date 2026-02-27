<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RestaurantController extends AbstractController
{
    #[Route('/demo/restaurant', name: 'app_demo_restaurant')]
    public function index(PlatRepository $platRepository): Response
    {
        $menu = [
            'entrees'  => $platRepository->findBy(['categorie' => 'entree']),
            'plats'    => $platRepository->findBy(['categorie' => 'plat']),
            'desserts' => $platRepository->findBy(['categorie' => 'dessert']),
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