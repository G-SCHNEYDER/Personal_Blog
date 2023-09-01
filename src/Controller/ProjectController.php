<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{

    private $repository;

    private $em;

    #[Route('/project/{id}', name: 'app_project_single')]
    public function display(int $id): Response
    {
        return $this->render('project.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
}
