<?php

namespace core;
require_once 'controllers/HomeController.php';
require_once 'controllers/ArticlesController.php';
require_once 'controllers/CategoriesController.php';

use controllers\AdminController;
use controllers\CategoriesController;

class Router
{
    public function __construct()
    {
    }

    public function goTo(string $url): void
    {

        $onlyUrl = explode('?', $url)[0];
        if (isset(explode('?', $url)[1])) {
            $params = explode('&', explode('?', $url)[1]);
            foreach ($params as $param) {
                $param = explode('=', $param);
                $params[$param[0]] = $param[1];
            }
        }
        switch ($onlyUrl) {
            case '/category':
                $this->render('header');
                $controller = new CategoriesController();
                $controller->renderCategory($params['id']);
                $this->render('footer');
                break;
            case '/':
                $this->render('header');
                $controller = new \controllers\HomeController();
                $controller->renderHome();
                $this->render('footer');
                break;
            case '/articles':
                $this->render('header');
                $controller = new \controllers\ArticlesController();
                $controller->renderArticles();
                $this->render('footer');
                break;
            case '/categories':
                $this->render('header');
                $controller = new \controllers\CategoriesController();
                $controller->renderCategories();
                $this->render('footer');
                break;
            case '/article':
                $this->render('header');
                $controller = new \controllers\ArticlesController();
                $controller->renderArticle($params['id']);
                $this->render('footer');
                break;
            case '/addComment':
                $this->render('header');
                include_once "./controllers/CommentController.php";
                $controller = new \controllers\CommentController();
                $controller->addComment($_POST['article_id'], $_POST['content'], $_POST['author']);
                header('Location: /article?id=' . $_POST['article_id']);
                break;
            case '/admin':
                include_once "controllers/AdminController.php";
                if (isset($_SESSION['username'])) {
                    header('Location: /admin/index');
                } else {
                    $this->render('header');
                    $this->render('admin/login');
                    $this->render('footer');
                }
                break;
            case '/admin/connexion':
                include_once "./controllers/AdminController.php";
                $admin = new \controllers\AdminController();
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];
                try {
                    if ($admin->connexion()) {
                        header('Location: /admin/index');
                    } else {
                        throw new \Exception("Incorrect password");
                    }
                } catch (\Exception $e) {
                    $_SESSION['error'] = "Une erreur est parvenue ! Veuillez réessayer";
                    unset($_SESSION['username']);
                    unset($_SESSION['password']);
                    header('Location: /admin');
                }
                break;
            case '/admin/index':
                $this->render("admin/header");
                include_once "./controllers/AdminController.php";
                $admin = new \controllers\AdminController();
                $admin->renderAdmin();
                break;
            case '/admin/disconnect':
                include_once "./controllers/AdminController.php";
                $admin = new AdminController();
                $admin->deconnexion();
                break;
            case '/admin/article/delete':
                include_once "./controllers/ArticlesController.php";
                $article = new \controllers\ArticlesController();
                $article->deleteArticle($params['id']);
                break;
            case '/admin/article/edit':
                $this->render("admin/header");
                include_once "./controllers/AdminController.php";
                $admin = new \controllers\AdminController();
                $admin->editArticle($params['id']);
                break;
            case '/admin/article/update':
                include_once "./controllers/ArticlesController.php";
                $article = new \controllers\ArticlesController();
                $article->updateArticle($_POST['id'], $_POST['title'], $_POST['content'], $_POST['author_id'], $_POST['category_id']);
                break;
            case '/admin/article/add':
                $this->render("admin/header");
                include_once "./controllers/AdminController.php";
                $admin = new \controllers\AdminController();
                $admin->addArticle();
                break;
            case '/admin/article/create':
                include_once "./controllers/ArticlesController.php";
                $article = new \controllers\ArticlesController();
                $article->createArticle($_POST['title'], $_POST['content'], $_POST['author_id'], $_POST['category_id']);
                break;
            case '/admin/comments/delete':
                include_once "./controllers/CommentController.php";
                $comment = new \controllers\CommentController();
                $comment->deleteComment($params['id']);
                break;
            case '/admin/comments':
                $this->render("admin/header");
                include_once "./controllers/AdminController.php";
                $admin = new \controllers\AdminController();
                $admin->renderComments();
                break;
            case '/admin/categories':
                $this->render("admin/header");
                include_once "./controllers/AdminController.php";
                $admin = new \controllers\AdminController();
                $admin->renderCategories();
                break;
            case '/admin/category/delete':
                include_once "./controllers/CategoriesController.php";
                $category = new \controllers\CategoriesController();
                $category->deleteCategory($params['id']);
                break;
            case '/admin/category/edit':
                $this->render("admin/header");
                include_once "./controllers/CategoriesController.php";
                $category = new \controllers\CategoriesController();
                $category->editCategory($params['id']);
                break;
            case '/admin/category/update':
                include_once "./controllers/CategoriesController.php";
                $category = new \controllers\CategoriesController();
                $category->updateCategory($_POST['id'], $_POST['libelle']);
                break;
            case '/admin/category/create':
                include_once "./controllers/CategoriesController.php";
                $category = new \controllers\CategoriesController();
                $category->createCategory($_POST['libelle']);
                break;
            default:
                include_once "views/404.php";
                $this->render('footer');
                break;
        }
    }

    public function render($view)
    {
        require_once 'views/' . $view . '.php';
    }

}