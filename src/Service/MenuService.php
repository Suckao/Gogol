<?php

namespace App\Service;

class MenuService
{
    public function createMenu() : array
    {
        $title = array(
            "name" => "Gogol",
            "route" => "home"
        );

        $leftMenuTitle = array(
            [
                "name" => "Articles",
                "icon" => "fas fa-bullhorn",
                "route" => "articles"
            ],
            [
                "name" => "Vidéos",
                "icon" => "fas fa-video",
                "route" => "videos"
            ],
            [
                "name" => "Profil",
                "icon" => "fas fa-cat",
                "route" => "profil"
            ],
            [
                "name" => "Contact",
                "icon" => "fas fa-paper-plane",
                "route" => "contact"
            ]
        );

        $data['leftMenuTitle'] = $leftMenuTitle;
        $data['title'] = $title;

        return $data;
    }
}