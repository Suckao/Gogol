<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Service\MenuService;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideosController extends AbstractController
{

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    #[Route('/videos', name: 'videos')]
    public function index(): Response
    {
        $menu = $this->menuService->createMenu('Vidéos',true);
        
        return $this->render('videos/index.html.twig', [
            'menu' => $menu,
        ]);
    }
}
