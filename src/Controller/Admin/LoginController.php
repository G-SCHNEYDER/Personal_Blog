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
    #[Route('/admin/login', name: 'admin_login')]
    public function index(#[CurrentUser] ?User $user, AuthenticationUtils $authenticationUtils): Response
    {

        // Récupère la dernière erreur d'authentification si il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();

        // Récupère le dernier identifiant utilisateur utilisé
        $lastUserIdentifier = $authenticationUtils->getLastUsername();

        // Ajoute le rôle admin au moment de la connection
        if($user !== null){
            $user->setRoles(['ROLE_ADMIN']);
        }

        return $this->render('admin/login.html.twig', [
            'last_username' => $lastUserIdentifier,
            'error' => $error,
        ]);
    }
}
