<?php

namespace controllers;

include_once "model/Admin.php";

use model\Admin;

class AdminController
{
    public function __construct()
    {
    }

    public function start(): void
    {
        if(isset($_SESSION['isConnected']) && $_SESSION['isConnected']){
            renderAdmin();
        }else{
            include_once ("views/admin/login.php");
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
                if($admin->getPassword() == hash('sha256',$password)) {
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
        include_once("views/admin/index.php");
    }


}