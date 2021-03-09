<?php

namespace App\Controller;

use App\Repository\VideosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Service\MenuService;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideosController extends AbstractController
{

    public function __construct(MenuService $menuService, VideosRepository $videosRepository)
    {
        $this->menuService = $menuService;

        $this->videosRepository = $videosRepository;
    }

    #[Route('/videos', name: 'videos')]
    public function index(): Response
    {
        $menu = $this->menuService->createMenu('Vidéos',true);

        $videos = $this->videosRepository->findAllVideosWithContent();

        $lastVideo = $videos[0];
        array_splice($videos,0,1);
        
        return $this->render('videos/index.html.twig', [
            'menu' => $menu,
            'allVideos' => $videos,
            'lastVideo' => $lastVideo
        ]);
    }
}
