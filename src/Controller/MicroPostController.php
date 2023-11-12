<?php

namespace App\Controller;
use DateTime;
use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class MicroPostController extends AbstractController
{
    #[Route('/micro-post', name: 'app_micro_post')]
    public function index(MicroPostRepository $postRepository): Response
    {
        return $this->render('micro_post/index.html.twig', [
            'postRepository' => $postRepository->findAll(),
        ]);
    }

    #[Route('/micro-post/{post}', name: 'app_micro_post_show')]
    public function showOne(MicroPost $post): Response
    {
        return $this->render('micro_post/show.html.twig', [
            'post' => $post,
        ]);
    }

    #[Route('/micro-post/add', name: 'app_micro_post_add', priority: 2)]
    public function add(Request $request, MicroPostRepository $postRepository): Response
    {
        $microPost = new MicroPost();
        $form = $this->createFormBuilder($microPost)
            ->add('title')
            ->add('text')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();
            $post->setCreated(new DateTime());
            $postRepository->add($post, true);


            // Add a flash
            $this->addFlash('success', 'Your micro post have been addded.');

            return $this->redirectToRoute('app_micro_post');

            // Redirect
        }

        return $this->renderForm(
            'micro_post/add.html.twig',
            [
                'form' => $form
            ]
        );
    }



#[Route('/micro-post/{post}/edit', name: 'app_micro_post_edit')]
    public function edit(MicroPost $post, Request $request, MicroPostRepository $postRepository): Response
{
    $form = $this->createFormBuilder($post)
        ->add('title')
        ->add('text')
        ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $post = $form->getData();
        $postRepository->add($post, true);

        // Add a flash
        $this->addFlash('success', 'Your micro post have been updated.');

        return $this->redirectToRoute('app_micro_post');
        // Redirect
    }

    return $this->renderForm(
        'micro_post/add.html.twig',
        [
            'form' => $form
        ]
    );
}
}


