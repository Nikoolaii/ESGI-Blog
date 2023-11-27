<?php

namespace model\engine;

use controllers\DbController;

class CategorieEngine
{
    public function __construct()
    {
    }

    public function getCategories()
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->query('SELECT * FROM categories');
        return $req;
    }

    public function getCategorie($id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare('SELECT * FROM categories WHERE id = :id');
        $req->execute(array('id' => $id));
        $categorie = $req->fetch();
        return $categorie;
    }

    public function addCategorie($libelle)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare('INSERT INTO categories (libelle) VALUES (:libelle)');
        $req->execute(array('libelle' => $libelle));
    }

    public function updateCategorie($id, $libelle)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare('UPDATE categories SET libelle = :libelle WHERE id = :id');
        $req->execute(array("libelle" => $libelle,'id'=> $id));
    }

    public function deleteCategorie($id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare('DELETE FROM categories WHERE id = :id');
        $req->execute(array('id' => $id));
    }
}