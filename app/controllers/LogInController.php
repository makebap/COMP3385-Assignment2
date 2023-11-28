<?php

require_once('C:\xampp\htdocs\app\framework\autoloader.php');
$validator = new Core\Validator();

if ($validator->authenticateUser($_POST['email'], $_POST['password'])) {
    header('Location: http://localhost/dashboard');
    die();
} else {
    $_POST['errors']['login'] = 'Invalid credentials.';
    require 'C:/xampp/htdocs/app/views/index.php';
}
