<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class blogController extends AbstractController
{

    #[Route("/", name:"home", methods:'GET')]
function home(PostsRepository $PostsRepository): Response
    {
    // $posts = $PostsRepository->findBy(
    //     [
    //         'state' => 'STATE_PUBLISHED',
    //     ],
    //     [
    //         'createdOn' => 'DESC',
    //     ]
    // );
    $posts = $PostsRepository->findPublished();
    // dd($posts);
    return $this->render('blog/home.html.twig',
        [
            'posts' => $posts,
        ]
    );
}
}
