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
        $categories = new \controllers\CategoriesController();
        $categories = $categories->showAllInObject();
        $_SESSION['categories'] = $categories;
        $length = count($articles);
        $articles = array_slice($articles, $length-5, $length);
        $_SESSION['articles'] = $articles;
        include_once "views/home.php";
    }
}