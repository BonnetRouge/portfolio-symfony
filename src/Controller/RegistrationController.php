<?php
namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $hasher,
        EntityManagerInterface $em
    ): Response {
        $error = null;

        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $password = $request->request->get('password');
            $confirm = $request->request->get('confirm_password');

            if ($password !== $confirm) {
                $error = 'Les mots de passe ne correspondent pas.';
            } else {
                $user = new User();
                $user->setEmail($email);
                $user->setPassword($hasher->hashPassword($user, $password));
                $user->setRoles(['ROLE_USER']);

                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('login');
            }
        }

        return $this->render('security/register.html.twig', [
            'error' => $error,
        ]);
    }
}