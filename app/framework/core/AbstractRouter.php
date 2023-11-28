<?php

namespace Core;

require_once(FRAMEWORK_DIR . "/autoloader.php");

abstract class AbstractRouter implements InterfaceRouter
{
    protected $routes = array();
    protected $root = '';
    public function __construct(string $root = '/')
    {
        if (empty($routes)) {
            $this->routes['/'] = 'index';
        }
        $this->root = $root;
    }
    public function addRoute(string $req, string $res)
    {
        $this->routes[$req] = $res;
    }
    public function removeRoute(string $route)
    {
        unset($this->routes[$route]);
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    abstract public function run();
}
