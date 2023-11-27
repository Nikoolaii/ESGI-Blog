<?php

namespace model\engine;

include_once "controllers/DbController.php";
use controllers\DbController;


class ArticlesEngine
{
    public function __construct()
    {
    }

    public function getArticles()
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("SELECT article.*, admin.username FROM article JOIN admin on article.author_id = admin.id;");
        $req->execute();
        $articles = $req->fetchAll();
        return $articles;
    }

    public function getArticleById($id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("SELECT article.*, admin.username FROM article JOIN admin on article.author_id = admin.id WHERE article.id = :id;");
        $req->execute(array(
            'id' => $id
        ));
        $article = $req->fetch();
        return $article;
    }

    public function addArticle($title, $content, $author_id, $categorie_id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("INSERT INTO article (title, content, author_id, categorie_id) VALUES (:title, :content, :author_id, :categorie_id)");
        $req->execute(array(
            'title' => $title,
            'content' => $content,
            'author_id' => $author_id,
            'categorie_id' => $categorie_id
        ));
    }

    public function updateArticle($id, $title, $content, $author_id, $categorie_id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("UPDATE article SET title = :title, content = :content, author_id = :author_id, categorie_id = :categorie_id WHERE id = :id");
        $req->execute(array(
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'author_id' => $author_id,
            'categorie_id' => $categorie_id
        ));
    }

    public function deleteArticle($id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("DELETE FROM article WHERE id = :id");
        $req->execute(array(
            'id' => $id
        ));
    }

    public function getArticleByAuthorId($author_id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("SELECT * FROM article WHERE author_id = :author_id");
        $req->execute(array(
            'author_id' => $author_id
        ));
        $articles = $req->fetchAll();
        return $articles;
    }

    public function getArticleByCategorieId($categorie_id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("SELECT * FROM article WHERE categorie_id = :categorie_id");
        $req->execute(array(
            'categorie_id' => $categorie_id
        ));
        $articles = $req->fetchAll();
        return $articles;
    }
}