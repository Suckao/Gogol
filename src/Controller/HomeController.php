<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\MenuService;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    public function __construct(ArticleRepository $articleRepository, MenuService $menuService)
    {
        $this->articleRepository = $articleRepository;
        $this->menuService = $menuService;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $menu = $this->menuService->createMenu('Gogol', true);
        
        $article = $this->articleRepository->findArticleByPublishContent();

        return $this->render('home/index.html.twig', [
            'menu' => $menu,
            'articles' => $article
        ]);
    }
}
