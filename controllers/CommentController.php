<?php

namespace controllers;

require_once 'model/Comments.php';

class CommentController
{
    public function __construct()
    {
    }

    public function addComment($article_id, $content, $author)
    {
        $query = new \model\engine\CommentsEngine();
        $query->addComment($content,$author,$article_id);
    }
}