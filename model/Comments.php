<?php

namespace model;

use model\engine\CommentsEngine;

require_once "model/engine/CommentsEngine.php";

class Comments
{

    private $id;
    private $content;
    private $author;
    private $article_id;
    private $article_title;

    public function __construct($id)
    {
        $query = new CommentsEngine();
        $comments = $query->getCommentsById($id);
        $this->id = $comments['id'];
        $this->content = $comments['content'];
        $this->author = $comments['author'];
        $article = new Articles($comments['article_id']);
        $this->article_title = $article->getTitle();
    }


    public function getId(): mixed
    {
        return $this->id;
    }

    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    public function getContent(): mixed
    {
        return $this->content;
    }

    public function setContent(mixed $content): void
    {
        $this->content = $content;
    }

    public function getAuthor(): mixed
    {
        return $this->author;
    }

    public function setAuthor(mixed $author): void
    {
        $this->author = $author;
    }

    public function getArticleId(): mixed
    {
        return $this->article_id;
    }

    public function setArticleId(mixed $article_id): void
    {
        $this->article_id = $article_id;
    }

    public function getArticleTitle(): mixed
    {
        return $this->article_title;
    }

    public function setArticleTitle(mixed $article_title): void
    {
        $this->article_title = $article_title;
    }

}