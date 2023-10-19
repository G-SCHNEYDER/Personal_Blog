<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // EasyAdmin default back-end template
        return $this->render('@EasyAdmin/page/content.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio')
            ->setLocales(['fr', 'en']);
    }

    public function configureMenuItems(): iterable
    {
        return[
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::Section('Administration'),
            MenuItem::linkToCrud('Gestion des Projets', 'fas fa-list', Project::class),
    
            MenuItem::Section("Utilisateurs"),
            MenuItem::linkToCrud('Gestion des Utilisateurs', 'fas fa-list', User::class),
        ];
        
    }
}
