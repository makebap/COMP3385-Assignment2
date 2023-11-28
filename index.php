<?php

require_once('config.php');
require_once('./app/framework/autoloader.php');

$app = new App\Application();
$app->getRouter()->addRoute('dashboard', 'dashboard');
$app->getRouter()->addRoute('create', 'create');
$app->getRouter()->addRoute('register', 'registration');
print_r($app->getRouter()->getRoutes());
$app->getRouter()->run();
