<?php

namespace model;

use model\engine\CategorieEngine;

class Categorie
{
    private $id;
    private $libelle;

    public function __construct($id)
    {
        $query = new CategorieEngine();
        $category = $query->getCategorie($id);
        $this->id = $category['id'];
        $this->libelle = $category['libelle'];
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
    public function getLibelle(): mixed
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle(mixed $libelle): void
    {
        $this->libelle = $libelle;
    }

    public function getArticles()
    {
        $query = new CategorieEngine();
        $articles = $query->getArticles($this->id);

        return $articles;
    }

}