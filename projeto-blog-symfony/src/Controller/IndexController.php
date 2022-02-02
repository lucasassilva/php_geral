<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @Route("/", name="post_index", methods="GET")
     */
    public function index(PostRepository $postRepository): Response
    {
        return $this->render("posts/welcome.html.twig", [
            "posts" => $postRepository->findAll(),
            "controller_name" => "IndexController",
        ]);
    }

    /**
     * @Route("/create", name="post_add", methods="GET")
     */
    public function add(): Response
    {
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        return $this->render("posts/add_post.html.twig", [
            "controller_name" => "IndexController",
            "form" => $form->createView(),
        ]);
    }

    /**
     * @Route("/create", name="post_create", methods="POST")
     */
    public function create(Request $request): Response
    {
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->doctrine->getManager();

            $em->persist($post);

            $em->flush();

            return $this->redirectToRoute("post_index");
        }
    }

    /**
     * @Route("/update/{id}", name="post_show", methods="GET")
     */
    public function show($id)
    {

        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        $em = $this->doctrine->getManager();

        $postRepository = $em->getRepository(Post::class);

        $post = $postRepository->find($id);

        return $this->render("posts/edit_post.html.twig", [
            "controller_name" => "IndexController",
            "posts" => $post,
            "form" => $form->createView(),
        ]);
    }

    /**
     * @Route("/update/{id}", name="post_update", methods="POST")
     */
    public function update($id, Request $request)
    {
        $em = $this->doctrine->getManager();

        $postRepository = $em->getRepository(Post::class);

        $post = $postRepository->find($id);

        $old = clone $post;

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($post == $old) {
                return $this->redirectToRoute("post_index");
            } else {
                $em = $this->doctrine->getManager();

                $em->persist($post);

                $em->flush();

                return $this->redirectToRoute("post_index");
            }
        }
    }


    /**
     * @Route("/delete/{id}", name="post_delete", methods="POST")
     */
    public function delete($id): Response
    {
        $em = $this->doctrine->getManager();

        $postRepository = $em->getRepository(Post::class);

        $post = $postRepository->find($id);

        $em->remove($post);

        $em->flush();

        return $this->redirectToRoute("post_index");
    }
}
