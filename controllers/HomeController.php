<?php

namespace controllers;

class HomeController
{
    public function __construct()
    {
    }

    public function renderHome(){
        $articles = new \controllers\ArticlesController();
        $articles = $articles->showAllInObject();
        $articles = array_slice($articles, -6);
        $_SESSION['articles'] = $articles;
        include_once "views/home.php";
    }
}