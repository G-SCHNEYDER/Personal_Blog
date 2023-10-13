<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AdminController extends AbstractController
{

    private $repository;

    private $em;


    #[Route('/admin/', name: 'admin_index')]
    public function index(): Response
    {

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('admin/projects/', name: 'admin_projects')]
    public function display_projects(ProjectRepository $projectRepository): Response
    {

        $projects = $projectRepository->findAll();

        return $this->render('admin/projects.html.twig',[
            'list_projects' => $projects,
        ]);
    }

    #[Route('admin/project/add/', name: 'admin_add_projects')]
    public function add_project(EntityManagerInterface $entityManager, Request $request): Response
    {

        $msg = "";

        // Create project form
        $form = $this->createForm(ProjectType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $project = $form->getData();

            // Save new project
            $entityManager->persist($project);
            $entityManager->flush();

            $msg = "Un nouveau projet a été enregistré";

        }

        return $this->render('admin/project_add.html.twig',[
            'form' => $form,
            'Msg' => $msg,
        ]);
    }

    #[Route('admin/project/{id}/', name: 'admin_project_show')]
    public function show_project(Project $project): Response
    {

        if(!$project){
            throw $this->createNotFoundException(
                "Aucun projet n'a été trouvé pour cet identifiant"
            );
        }

        return $this->render('admin/project_show.html.twig',[
            'Project' => $project,
        ]);
    }

}
