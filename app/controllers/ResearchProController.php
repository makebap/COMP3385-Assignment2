<?php

class ResearchProController
{
    private $db;

    public function __construct()
    {
        $this->db = new MyDBConnect('user_management_system', 'localhost', 'root', '');
        header('Location: http://localhost/');
    }

    function getDB()
    {
        return $this->db;
    }
}
