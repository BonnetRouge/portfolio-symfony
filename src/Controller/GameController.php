<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameType;
use Doctrine\ORM\Exception\RepositoryException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GameController extends AbstractController
{
    #[Route('/game/add', name: 'add_game')]
    public function ajouter(Request $request, ManagerRegistry $doctrine): Response
    {
        $game = new Game();

        $form = $this->createForm(GameType::class, $game);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($game);
            $em->flush();

            return $this->redirectToRoute('');
        }

        return $this->render('game/ajouter.html.twig', [
            'formulaire' => $form->createView()
        ]);
    }

    #[Route('/game/edit/{id}', name: 'edit_game')]
    public function edit(Request $request, ManagerRegistry $doctrine, Game $game): Response
    {
        $form = $this->createForm(GameType::class, $game);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();

            return $this->redirectToRoute('list_game');
        }

        return $this->render('game/form.html.twig', [
            'formulaire' => $form->createView()
        ]);
    }

    #[Route('/game/list', name: 'list_game')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Game::class);

        $games = $repository->findAll();

        return $this->render('game/list.html.twig', [
            'games' => $games
        ]);
    }

    #[Route('/game/delete/{id}', name: 'delete_game')]
    public function delete(ManagerRegistry $doctrine, Game $game): Response
    {
        $em = $doctrine->getManager();
        $em->remove($game);
        $em->flush();

        return $this->redirectToRoute("list");
    }
}
