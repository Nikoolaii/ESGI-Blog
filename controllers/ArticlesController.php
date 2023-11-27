<?php

namespace controllers;

require_once 'model/engine/ArticlesEngine.php';
require_once 'model/Articles.php';

class ArticlesController
{
    public function __construct()
    {
    }

    public function showAllInObject(){
        $articles = new \model\engine\ArticlesEngine();
        $articles = $articles->getArticles();
        $articles = array_map(function ($article){
            return new \model\Articles($article['id']);
        }, $articles);
        return $articles;
    }
}