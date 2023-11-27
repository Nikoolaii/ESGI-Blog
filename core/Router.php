<?php

namespace core;
require_once 'controllers/HomeController.php';
require_once 'controllers/ArticlesController.php';
require_once 'controllers/CategoriesController.php';
use controllers\HomeController;
use controllers\ArticlesController;
use controllers\CategoriesController;

class Router
{
    public function __construct()
    {
    }

    public function render($view)
    {
        require_once 'views/' . $view . '.php';
    }

    public function goTo(String $url): void{
        switch ($url) {
            case '/':
                $this->render('header');
                $controller = new \controllers\HomeController();
                $controller->renderHome();
                $this->render('footer');
                break;
            case '/articles':
                $this->render('header');
                include_once "controllers/ArticlesController.php";
                $this->render('footer');
                break;
            case '/categories':
                $this->render('header');
                include_once "controllers/CategoriesController.php";
                $this->render('footer');
                break;
            case '/admin':
                include_once "controllers/AdminController.php";
                $admin = new \controllers\AdminController();
                $admin->start();
                break;
            case '/admin/connexion':
                include_once "./controllers/AdminController.php";
                $admin = new \controllers\AdminController();
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];
                try {
                    if($admin->connexion() == true){
                        header('Location: /admin/index');
                    }else{
                        throw new \Exception("Incorrect password");
                    }
                } catch (\Exception $e) {
                    $_SESSION['error'] = "An error occured, please try again.";
                    header('Location: /admin');
                }
                break;
            case '/admin/index':
                include_once "./controllers/AdminController.php";
                $admin = new \controllers\AdminController();
                $admin->renderAdmin();
                break;
            default:
                include_once "views/404.php";
                $this->render('footer');
                break;
        }
    }

}