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
                    $_SESSION['error'] = "An error occurred, please try again.";
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
            case '/admin/delete':
                include_once "./controllers/ArticlesController.php";
                $article = new \controllers\ArticlesController();
                $article->deleteArticle($params['id']);
                break;
            case '/admin/edit':
                $this->render("admin/header");
                include_once "./controllers/AdminController.php";
                $admin = new AdminController();
                $admin->editArticle($params['id']);
                break;
            case '/admin/update':
                include_once "./controllers/ArticlesController.php";
                $article = new ArticlesController();
                $article->updateArticle($_POST['id'], $_POST['title'], $_POST['content'], $_POST['category_id']);
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