<?php

namespace controllers;

class DbController
{
    public function __construct()
    {

    }

    public function dbConnect(): \PDO {
        require_once './config/bdd.php';
        $db = new \PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8;port='.PORT, USER, PASSWORD);
        return $db;
    }
}