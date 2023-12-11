<?php

namespace model;

include_once "model/engine/AdminEngine.php";

use model\engine\AdminEngine;

class Admin
{
    private $id;
    private $username;
    private $password;
    private $email;

    public function __construct($username)
    {
        $query = new AdminEngine();
        try {
            $admin = $query->getAdminByUsername($username);
            $this->id = $admin['id'];
            $this->username = $admin['username'];
            $this->password = $admin['password'];
            $this->email = $admin['email'];
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }
}