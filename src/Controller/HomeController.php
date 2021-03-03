<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {

        $title = "Gogol";

        $leftMenuTitle = array(
            [
                "name" => "Articles",
                "icon" => "fas fa-bullhorn"
            ],
            [
                "name" => "Profil",
                "icon" => "fas fa-cat"
            ],
            [
                "name" => "À propos",
                "icon" => "fas fa-comment-dots"
            ],
            [
                "name" => "Contact",
                "icon" => "fas fa-paper-plane"
            ]
        );
        
        $article = $this->articleRepository->findArticleByPublishContent();

        $data['leftMenuTitle'] = $leftMenuTitle;
        $data['title'] = $title;

        return $this->render('home/index.html.twig', [
            'data' => $data,
            'articles' => $article
        ]);
    }
}
