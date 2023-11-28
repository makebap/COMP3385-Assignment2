<?php

namespace App;

use Core\Router;

class Application
{
    private $router;
    public function __construct()
    {
        $this->router = new Router();
    }

    public function getRouter()
    {
        return $this->router;
    }
}
