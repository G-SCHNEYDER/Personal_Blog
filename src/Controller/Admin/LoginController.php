<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'admin_login')]
    public function index(#[CurrentUser] ?User $user, AuthenticationUtils $authenticationUtils): Response
    {

        // Récupère la dernière erreur d'authentification si il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();

        // Récupère le dernier identifiant utilisateur utilisé
        $lastUserIdentifier = $authenticationUtils->getLastUsername();

        return $this->render('admin/login.html.twig', [
            'last_username' => $lastUserIdentifier,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'admin_logout', methods: ['GET'])]
    public function logout(): never
    {
        // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}
