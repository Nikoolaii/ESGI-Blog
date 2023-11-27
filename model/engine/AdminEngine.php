<?php

namespace model\engine;

use controllers\DbController;

include_once "./controllers/DbController.php";

class AdminEngine
{
    public function __construct()
    {
    }

    public function getAdmin()
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("SELECT * FROM admin");
        $req->execute();
        $admins = $req->fetchAll();
        return $admins;
    }

    public function getAdminById($id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("SELECT * FROM admin WHERE id = :id");
        $req->execute(array(
            'id' => $id
        ));
        $admin = $req->fetch();
        return $admin;
    }

    public function addAdmin($username, $password, $email)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("INSERT INTO admin (username, password, email) VALUES (:username, :password, :email)");
        $req->execute(array(
            'username' => $username,
            'password' => PASSWORD,
            'email' => $email,
        ));
    }

    public function updateAdmin($id, $username, $password, $email)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("UPDATE admin SET username = :username, password = :password, email = :email, WHERE id = :id");
        $req->execute(array(
            'id' => $id,
            'username' => $username,
            'password' => PASSWORD,
            'email' => $email,
        ));
    }

    public function deleteAdmin($id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("DELETE FROM admin WHERE id = :id");
        $req->execute(array(
            'id' => $id
        ));
    }

    public function getAdminByUsername($username)
    {
        try {
            $bdd = new DbController();
            $bdd = $bdd->dbConnect();
            $req = $bdd->prepare("SELECT * FROM admin WHERE username = :username OR email = :username");
            $req->execute(array(
                'username' => $username
            ));
            return $req->fetch();
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}