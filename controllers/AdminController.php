<?php

namespace controllers;

include_once "model/Admin.php";
include_once "model/engine/CategorieEngine.php";

class AdminController
{
    public function __construct()
    {
    }

    public function start(): void
    {
        if (isset($_SESSION['isConnected']) && $_SESSION['isConnected']) {
            renderAdmin();
        } else {
            include_once("views/admin/login.php");
        }
    }

    public function connexion()
    {
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            include_once("model/engine/AdminEngine.php");
            try {
                $admin = new \model\Admin($username);
                if ($admin->getPassword() == hash('sha256', $password)) {
                    $_SESSION['isConnected'] = true;
                    return true;
                } else {
                    $_SESSION['error'] = "Mot de passe incorrect";
                    return false;
                }
            } catch (\Exception $e) {
                $_SESSION['error'] = $e->getMessage();
                return false;
            }
        }
    }

    public function renderAdmin()
    {
        require_once("controllers/ArticlesController.php");
        $articles = new \controllers\ArticlesController();
        $_SESSION['articles'] = $articles->showAllInObject();
        include_once("views/admin/index.php");
    }

    public function deconnexion()
    {
        session_destroy();
        header("Location: /");
    }

    public function editArticle($id)
    {
        $article = new \model\Articles($id);
        $_SESSION['article'] = $article;

        $categories = new \model\engine\CategorieEngine();
        $categories = $categories->getCategories();
        $_SESSION['categories'] = array_map(function ($categorie) {
            return new \model\Categorie($categorie['id']);
        }, $categories);
        include_once "views/admin/editArticle.php";
    }

    public function addArticle()
    {
        $categories = new \model\engine\CategorieEngine();
        $categories = $categories->getCategories();
        $_SESSION['categories'] = array_map(function ($categorie) {
            return new \model\Categorie($categorie['id']);
        }, $categories);

        $admin = new \model\Admin($_SESSION['username']);
        $_SESSION['admin'] = $admin;
        include_once "views/admin/newArticle.php";
    }

    public function renderComments()
    {
        require_once("controllers/CommentController.php");
        $comments = new \controllers\CommentController();
        $_SESSION['comments'] = $comments->getAllCommentsInObject();
        include_once("views/admin/comments.php");
    }

    public function renderCategories()
    {
        require_once("controllers/CategoriesController.php");
        $categories = new \controllers\CategoriesController();
        $_SESSION['categories'] = $categories->showAllInObject();
        include_once("views/admin/cat.php");
    }


}