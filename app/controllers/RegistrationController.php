<?php

require_once('../models/MyDBConnect.php');

function confirmEmailAddress($email1, $email2)
{
    if (strtolower($email1) == strtolower($email2)) {
        $_POST['errors']['confEmail'] = "";
        return true;
    } else {
        $_POST['errors']['confEmail'] = "Email addresses must match.";
        return false;
    }
}

function confirmPassword($password1, $password2)
{
    if ($password1 == $password2) {
        $_POST['errors']['confPass'] = "";
        return true;
    } else {
        $_POST['errors']['confPass'] = "Passwords must match.";
        return false;
    }
}

function uniqueUser($username)
{
    $db = new MyDBConnect('user_management_system', 'localhost', 'root', '');
    if ($username == "") {
        $_POST['errors']['username'] = "Invalid username.";
        return false;
    }
    if (!$db->usernameQuery($username)) {
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

function registerUser()
{
    $errorExists = false;
    if (!confirmEmailAddress($_POST['email'], $_POST['confEmail'])) {
        $errorExists = true;
    }
    if (!confirmPassword($_POST['password'], $_POST['confPassword'])) {
        $errorExists = true;
    }
    if (!uniqueUser($_POST['username'])) {
        $errorExists = true;
    }
    if (!validEmail($_POST['email'])) {
        $errorExists = true;
    }
    if (!validPassword($_POST['password'])) {
        $errorExists = true;
    }

    if ($errorExists) {
        header('Location: http://localhost/register');
        die();
    } else {
        $db = new MyDBConnect('user_management_system', 'localhost', 'root', '');
        $db->createUser($_POST['username'], $_POST['password'], $_POST['email'], "Research Group Manager");
        header('Location: http://localhost/dashboard');
        die();
    }
}

registerUser();
