<?php

namespace controllers;

require_once 'model/engine/CategorieEngine.php';
require_once 'model/Categorie.php';

class CategoriesController
{
    function __construct()
    {
    }

    public function showAllInObject(): array
    {
        $categories = new \model\engine\CategorieEngine();
        $categories = $categories->getCategories();
        return array_map(function ($category){
            return new \model\Categorie($category['id']);
        }, $categories);
    }

    public function showAll(){
        $categories = new \model\engine\CategorieEngine();
        return $categories->getCategories();
    }

    public function renderCategories(){
        $_SESSION['categories'] = $this->showAllInObject();
        include_once "views/categories.php";
    }

    public function renderCategory($id){
        $category = new \model\engine\CategorieEngine();
        $articles = $category->getArticles($id);
        $category = new \model\Categorie($id);
        $_SESSION['articles'] = array_map(function ($article){
            return new \model\Articles($article['id']);
        }, $articles);
        include_once "views/category.php";
    }
}