<?php

namespace App\Controller\Admin;

use App\Entity\BlogPost;
use App\Form\BlogPostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BlogPostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class BlogAdminController extends AbstractController
{

    private $repository;

    private $em;

    public function __construct(BlogPostRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    #[Route('/blog/admin/', name: 'blog_admin_posts')]
    public function index(): Response
    {

        $posts = $this->repository->findAll();

        return $this->render('admin/posts.html.twig', [
            'controller_name' => 'BlogAdminController',
            'posts' => $posts
        ]);
    }

    #[Route('/blog/admin/post/add', name: 'blog_admin_post_add')]
    public function new(Request $request): Response
    {

        $new_post = new BlogPost();
        $form = $this->createForm(BlogPostType::class, $new_post);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {

            $new_post = $form->getData();
            $this->em->persist($new_post);
            $this->em->flush();

            return $this->redirectToRoute('/blog/admin/posts');
        }

        return $this->render('admin/add.html.twig', [
            'controller_name' => 'BlogAdminController',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/blog/admin/post/edit/{id}', name: 'blog_admin_post_edit')]
    public function edit(BlogPost $post): Response
    {
        $form = $this->createForm(BlogPostType::class, $post);

        return $this->render('admin/edit.html.twig', [
            'controller_name' => 'BlogAdminController',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/blog/admin/post/remove/{id}', name: 'blog_admin_post_remove')]
    public function remove(BlogPost $post): Response
    {
        $this->em->remove($post);
        $this->em->flush();

        return $this->redirectToRoute('/blog/admin/posts');
    }
}
