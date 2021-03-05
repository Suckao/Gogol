<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ArticleRepository;
use App\Repository\ContentRepository;
use App\Repository\ThematicsRepository;
use App\Service\MenuService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    public function __construct(ArticleRepository $articleRepository,ContentRepository $contentRepository,ThematicsRepository $thematicsRepository, MenuService $menuService)
    {
        $this->articleRepository = $articleRepository;
        $this->contentRepository = $contentRepository;
        $this->thematicsRepository = $thematicsRepository;

        $this->menuService = $menuService;
    }

    #[Route('/articles', name: 'articles')]
    public function index(): Response
    {
        $articles = $this->articleRepository->findAllArticleWithContent();

        $menu = $this->menuService->createMenu('articles',true);
        return $this->render('article/articles.html.twig', [
            'menu' => $menu,
            'articles' => $articles
        ]);
    }

    #[Route('/articles/{id}', name: 'article_infos')]
    public function showArticle($id): Response
    {
        $article = $this->articleRepository->findOneByIdWithContent($id);

        $menu = $this->menuService->createMenu($article[0]->getTitle());

        return $this->render('article/articleShow.html.twig', [
            'menu' => $menu,
        ]);
    }
}
