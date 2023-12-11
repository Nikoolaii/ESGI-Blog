<?php

namespace controllers;

require_once 'model/Comments.php';
require_once 'model/engine/CommentsEngine.php';

class CommentController
{
    public function __construct()
    {
    }

    public function addComment($article_id, $content, $author)
    {
        $query = new \model\engine\CommentsEngine();
        $query->addComment($content, $author, $article_id);
    }

    public function getAllCommentsInObject()
    {
        $query = new \model\engine\CommentsEngine();
        $comments = $query->getComments();
        return array_map(function ($comment) {
            return new \model\Comments($comment['id']);
        }, $comments);
    }

    public function deleteComment($id)
    {
        $query = new \model\engine\CommentsEngine();
        $query->deleteComment($id);
        header('Location: /admin/comments');
    }
}