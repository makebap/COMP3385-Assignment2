<?php
require_once('C:\xampp\htdocs\app\framework\autoloader.php');
$session = new Core\Session();
$session->unsetUser();

header("Location: http://localhost/");
die();
