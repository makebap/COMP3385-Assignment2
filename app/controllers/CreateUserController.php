<?php

require_once('../models/MyDBConnect.php');

$db = new MyDBConnect('user_management_system', 'localhost', 'root', '');

if ($db->registerUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role'])) {
    header('Location: http://localhost/dashboard');
    die();
} else {
    header('Location: http://localhost/create');
    die();
}
