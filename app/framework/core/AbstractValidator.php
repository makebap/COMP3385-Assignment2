<?php

namespace Core;

use Model\DBConnect;

abstract class AbstractValidator
{
    protected $db;
    public function __construct()
    {
        $this->db = new DBConnect('user_management_system');
    }


    public function validEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    abstract public function validPassword($password);

    abstract public function authenticateUser($email, $password);
}
