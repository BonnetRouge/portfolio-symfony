<?php

namespace App\Controller;

use App\Repository\CoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MusiqueController extends AbstractController
{
    #[Route('/demo/musique', name: 'app_demo_musique')]
    public function index(CoursRepository $coursRepository): Response
    {
        return $this->render('musique/index.html.twig', [
            'cours' => $coursRepository->findAll(),
        ]);
    }

    #[Route('/demo/musique/cours/{id}', name: 'app_demo_musique_cours')]
    public function cours(int $id, CoursRepository $coursRepository): Response
    {
        $cours = $coursRepository->find($id);

        if (!$cours) {
            throw $this->createNotFoundException('Cours introuvable.');
        }

        return $this->render('musique/cours.html.twig', [
            'cours' => $cours,
            'totalCours' => $coursRepository->count([]),
        ]);
    }

    #[Route('/demo/musique/progression', name: 'app_demo_musique_progression')]
    public function progression(CoursRepository $coursRepository): Response
    {
        return $this->render('musique/progression.html.twig', [
            'cours' => $coursRepository->findAll(),
        ]);
    }
}