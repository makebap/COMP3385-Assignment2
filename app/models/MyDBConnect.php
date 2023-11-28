<?php
require_once('C:\xampp\htdocs\app\framework\autoloader.php');

class MyDBConnect extends Model\DBConnect
{
    public function usernameQuery($username)
    {
        $sql = 'SELECT username FROM user WHERE username = "' . $username . '"';
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function createUser($username, $password, $email, $role)
    {
        $sql = "INSERT INTO user (username, password, email, role) VALUES ('" . $username . "', '" . password_hash($password, PASSWORD_DEFAULT) . "', '" . $email . "', '" . $role . "')";
        if ($this->conn->query($sql) === TRUE) {
            // echo "New record created successfully";
        } else {
            // echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    function uniqueUser($username)
    {
        if ($username == "") {
            $_POST['errors']['username'] = "Invalid username.";
            return false;
        }
        if (!$GLOBALS['db']->usernameQuery($username)) {
            $_POST['errors']['username'] = "";
            return true;
        } else {
            $_POST['errors']['username'] = "Username taken.";
            return false;
        }
    }

    function validEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_POST['errors']['email'] = "Invalid email.";
            return false;
        }
        $_POST['errors']['email'] = "";
        return true;
    }

    function validPassword($password)
    {
        $hasUpper = false;
        $hasNumber = false;
        for ($i = 0; $i < strlen($password); $i++) {
            if (ctype_upper($password[$i])) {
                $hasUpper = true;
            }
            if (ctype_digit($password[$i])) {
                $hasNumber = true;
            }
        }
        if ($hasUpper == false || $hasNumber == false || $password == "" || strlen($password) < 10) {
            $_POST['errors']['password'] = "Passwords must contain at least one upper case character, at least one digit and be at least 10 characters long";
            return false;
        }
        return true;
    }

    function registerUser($username, $email, $password, $role)
    {
        $errorExists = false;
        if (!self::uniqueUser($username)) {
            $errorExists = true;
        }
        if (!self::validEmail($email)) {
            $errorExists = true;
        }
        if (!self::validPassword($password)) {
            $errorExists = true;
        }

        if ($errorExists) {
            return false;
        } else {
            self::createUser($username, $password, $email, $role);
            return true;
        }
    }
}
