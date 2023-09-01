<?php

namespace App\Controller\Admin;

use App\Entity\BlogPost;
use App\Form\BlogPostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
{

    private $repository;

    private $em;


    #[Route('/admin/', name: 'blog_admin_posts')]
    public function index(): Response
    {

        return $this->render('admin/posts.html.twig', [
            'controller_name' => 'BlogAdminController',
        ]);
    }

    // #[Route('/blog/admin/post/add', name: 'blog_admin_post_add')]
    // public function new(Request $request): Response
    // {

    //     return $this->render('admin/add.html.twig', [
    //         'controller_name' => 'BlogAdminController',
    //     ]);
    // }

    // #[Route('/blog/admin/post/edit/{id}', name: 'blog_admin_post_edit')]
    // public function edit(BlogPost $post): Response
    // {

    //     return $this->render('admin/edit.html.twig', [
    //         'controller_name' => 'BlogAdminController',
    //     ]);
    // }

    // #[Route('/blog/admin/post/remove/{id}', name: 'blog_admin_post_remove')]
    // public function remove(BlogPost $post): Response
    // {
    //     $this->em->remove($post);
    //     $this->em->flush();

    //     return $this->redirectToRoute('/blog/admin/posts');
    // }
}
