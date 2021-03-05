<?php

namespace App\Controller;

use App\Service\MenuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    #[Route('/contact', name: 'contact')]
    public function index(): Response
    {
        $menu = $this->menuService->createMenu('Contact',true);

        return $this->render('contact/index.html.twig', [
            'menu' => $menu,
        ]);
    }
}
