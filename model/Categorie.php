<?php

namespace model;

class Categorie
{
    private $id;
    private $libelle;

    public function __construct($id, $libelle)
    {
        $this->id = $id;
        $this->libelle = $libelle;
    }
}