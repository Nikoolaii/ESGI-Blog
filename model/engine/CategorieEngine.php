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
        $req = $bdd->prepare('SELECT * FROM categories');
        $req->execute();
        $categories = $req->fetchAll();
        return $categories;
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

    public function getArticles($id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare('SELECT * FROM article WHERE category_id = :id');
        $req->execute(array('id' => $id));
        $articles = $req->fetchAll();
        return $articles;
    }
}