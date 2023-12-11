<?php

namespace controllers;

require_once 'model/engine/ArticlesEngine.php';
require_once 'model/Articles.php';

class ArticlesController
{
    public function __construct()
    {
    }

    public function showAll()
    {
        $articles = new \model\engine\ArticlesEngine();
        return $articles->getArticles();
    }

    public function renderArticles()
    {
        $_SESSION['articles'] = $this->showAllInObject();
        include_once "views/articles.php";
    }

    public function showAllInObject()
    {
        $articles = new \model\engine\ArticlesEngine();
        $articles = $articles->getArticles();
        return array_map(function ($article) {
            return new \model\Articles($article['id']);
        }, $articles);
    }

    public function renderArticle($id)
    {
        $article = new \model\Articles($id);
        $_SESSION['article'] = $article;
        include_once "views/article.php";
    }

    public function deleteArticle($id)
    {
        $article = new \model\engine\ArticlesEngine();
        $article->deleteArticle($id);
        header('Location: /admin/index');
    }
}