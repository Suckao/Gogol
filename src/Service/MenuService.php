<?php

namespace App\Service;

use phpDocumentor\Reflection\Types\Boolean;

class MenuService
{
    public function createMenu($title, $leftMenu = null) : array
    {
        $title = array(
            "name" => $title
        );

        if($leftMenu) {
            $leftMenuTitle = array(
                [
                    "name" => "Gogol",
                    "icon" => "fas fa-home",
                    "route" => "home"
                ],
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
        }else {
            $data['leftMenuTitle'] = null;
        }

        $data['title'] = $title;

        return $data;
    }
}