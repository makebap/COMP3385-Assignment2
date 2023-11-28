<?php

namespace Model;

use mysqli;

class DBConnect
{
    protected $conn;
    public function __construct($dbname, $servername = "localhost", $username = "root", $password = "")
    {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function emailQuery($email)
    {
        $sql = 'SELECT email FROM user WHERE email = "' . $email . '"';
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($email, $password)
    {
        $sql = 'SELECT email, password FROM user WHERE email = "' . $email . '"';
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            return true;
        }
        return false;
    }

    public function getUserInfo($email)
    {
        $sql = 'SELECT role, username, email FROM user WHERE email = "' . $email . '"';
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
}
