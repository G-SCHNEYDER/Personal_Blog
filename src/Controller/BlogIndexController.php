<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogIndexController extends AbstractController
{
    #[Route('/blog', name: 'app_blog_index')]
    public function index(): Response
    {
        return $this->render('blog_index/index.html.twig', [
            'controller_name' => 'BlogIndexController',
        ]);
    }
}
