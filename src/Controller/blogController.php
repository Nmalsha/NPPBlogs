<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class blogController extends AbstractController
{

    #[Route("/", name:"home", methods:'GET')]
function home(PostsRepository $PostsRepository,
    PaginatorInterface $paginatorInterface,
    Request $request
): Response {

    $data = $PostsRepository->findPublished();
    $posts = $paginatorInterface->paginate(
        $data, $request->query->getInt('page', 1),
        10

    );
    // dd($posts);
    return $this->render('blog/home.html.twig',
        [
            'posts' => $posts,
        ]
    );
}
}
