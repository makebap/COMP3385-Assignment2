<?php

spl_autoload_register(function ($class) {
    if (!defined('ROOT_DIR')) {
        define('ROOT_DIR', 'C:\xampp\htdocs\app');
        define('FRAMEWORK_DIR', ROOT_DIR . '\framework');
        define('CONTROLLERS_DIR', FRAMEWORK_DIR . '\controllers');
        define('CORE_DIR', FRAMEWORK_DIR . '\core');
        define('MODELS_DIR', FRAMEWORK_DIR . '\models');
        define('VIEWS_DIR', FRAMEWORK_DIR . '\views');
        define('ROUTES_DIR', ROOT_DIR . '\routes');
    }
    $ends = explode('\\', $class);
    $class = $ends[1];
    if (file_exists(CONTROLLERS_DIR . '/' . $class . '.php')) {
        require CONTROLLERS_DIR . '/' . $class . '.php';
    } else if (file_exists(CORE_DIR . '/' . $class . '.php')) {
        require CORE_DIR . '/' . $class . '.php';
    } else if (file_exists(MODELS_DIR . '/' . $class . '.php')) {
        require MODELS_DIR . '/' . $class . '.php';
    } else if (file_exists(VIEWS_DIR . '/' . $class . '.php')) {
        require VIEWS_DIR . '/' . $class . '.php';
    } else if (file_exists(ROUTES_DIR . '/' . $class . '.php')) {
        require ROUTES_DIR . '/' . $class . '.php';
    } else {
        trigger_error($class . ' could not be found:', E_USER_ERROR);
    }
});
