<?php
define('ROOT_DIR', 'C:\xampp\htdocs\app');
define('FRAMEWORK_DIR', ROOT_DIR . '\framework');
define('CONTROLLERS_DIR', FRAMEWORK_DIR . '\controllers');
define('CORE_DIR', FRAMEWORK_DIR . '\core');
define('MODELS_DIR', FRAMEWORK_DIR . '\models');
define('VIEWS_DIR', FRAMEWORK_DIR . '\views');
define('ROUTES_DIR', ROOT_DIR . '\routes');
define("APP_URL", "http://localhost/");
define("PUBLIC_URL", "http://localhost/public/");

$framework = array(
    FRAMEWORK_DIR . '/controllers',
    FRAMEWORK_DIR . '/core',
    FRAMEWORK_DIR . '/models'
);

foreach ($framework as $directories) {
    foreach (glob("{$directories}/*.php") as $directory) {
        require_once($directory);
    }
}
