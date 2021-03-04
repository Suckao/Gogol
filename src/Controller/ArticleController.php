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

        /*foreach($articles as $article) {
            $content = $this->contentRepository->find($article->getContent());
            foreach($content->thematics as $theme) {
                dd($theme->getName);
            }
            dd($content->thematics);
            $thematics = $content->getThematics();
            dd($thematics);
            
        }*/

        $menu = $this->menuService->createMenu();
        return $this->render('article/articles.html.twig', [
            'menu' => $menu,
            'articles' => $articles
        ]);
    }
}
