<?php

namespace model;

use model\engine\ArticlesEngine;
use model\engine\CategorieEngine;

include_once "model/engine/ArticlesEngine.php";
include_once "model/Comments.php";

class Articles
{
    private $id;
    private $title;
    private $content;
    private $author;
    private $category_id;

    private $author_id;

    public function __construct($id)
    {
        $query = new ArticlesEngine();
        $article = $query->getArticleById($id);
        $this->id = $article['id'];
        $this->title = $article['title'];
        $this->content = $article['content'];
        $this->author = $article['username'];
        $this->author_id = $article['author_id'];
        $this->category_id = $article['category_id'];

    }

    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAuthorId(): mixed
    {
        return $this->author_id;
    }

    /**
     * @param mixed $author_id
     */
    public function setAuthorId(mixed $author_id): void
    {
        $this->author_id = $author_id;
    }

    /**
     * @return mixed
     */
    public function getTitle(): mixed
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle(mixed $title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent(): mixed
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent(mixed $content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getAuthor(): mixed
    {
        return $this->author;
    }

    /**
     * @param mixed $author_id
     */
    public function setAuthor(mixed $author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getCategoryId(): mixed
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId(mixed $category_id): void
    {
        $this->category_id = $category_id;
    }

    public function getComments(): array
    {
        $query = new ArticlesEngine();
        $comments = $query->getCommentsByArticleId($this->id);
        return array_map(function ($comment) {
            return new Comments($comment['id']);
        }, $comments);
    }

    public function getCategory(): string
    {
        $query = new CategorieEngine();
        $category = $query->getCategorie($this->category_id);
        return $category['libelle'];
    }

}