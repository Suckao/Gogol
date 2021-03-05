<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Service\MenuService;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    #[Route('/profil', name: 'profil')]
    public function index(): Response
    {
        $menu = $this->menuService->createMenu('Profil',true);

        return $this->render('profil/index.html.twig', [
            'menu' => $menu,
        ]);
    }
}
