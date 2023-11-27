<?php

namespace model\engine;

require_once "controllers/DbController.php";

use controllers\DbController;

class CommentsEngine
{
    public function __construct()
    {
    }

    public function getComments()
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("SELECT * FROM comments");
        $req->execute();
        $comments = $req->fetchAll();
        return $comments;
    }

    public function getCommentsById($id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("SELECT * FROM comments WHERE id = :id");
        $req->execute(array(
            'id' => $id
        ));
        $comment = $req->fetch();
        return $comment;
    }

    public function addComment($content, $author, $article_id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("INSERT INTO comments (content, author, article_id) VALUES (:content, :author, :article_id)");
        $req->execute(array(
            'content' => $content,
            'author' => $author,
            'article_id' => $article_id
        ));
    }

    public function updateComment($id, $content, $author, $article_id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("UPDATE comments SET content = :content, author = :author, article_id = :article_id WHERE id = :id");
        $req->execute(array(
            'id' => $id,
            'content' => $content,
            'author' => $author,
            'article_id' => $article_id
        ));
    }

    public function deleteComment($id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("DELETE FROM comments WHERE id = :id");
        $req->execute(array(
            'id' => $id
        ));
    }

    public function getCommentsByArticleId($article_id)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $req->execute(array(
            'article_id' => $article_id
        ));
        $comments = $req->fetchAll();
        return $comments;
    }

    public function getCommentsByauthor($author)
    {
        $bdd = new DbController();
        $bdd = $bdd->dbConnect();
        $req = $bdd->prepare("SELECT * FROM comments WHERE author = :author");
        $req->execute(array(
            'author' => $author
        ));
        $comments = $req->fetchAll();
        return $comments;
    }
}