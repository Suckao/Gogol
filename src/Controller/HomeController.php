<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
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

        return $this->render('home/index.html.twig', [
            'leftMenuTitle' => $leftMenuTitle,
        ]);
    }
}
