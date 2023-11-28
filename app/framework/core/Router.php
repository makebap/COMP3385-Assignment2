<?php

namespace Core;

use Response;

require_once(FRAMEWORK_DIR . '/autoloader.php');

class Router extends AbstractRouter
{
    public function run()
    {
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        $req = pathinfo($url);
        if ($req['filename'] == '') {
            $req['filename'] = '/';
        }
        if (isset($this->routes[$req['filename']])) {
            echo $this->routes[$req['filename']];
            $resClass = 'Response\\' . $this->routes[$req['filename']]  . 'Response';
            $res = new $resClass($method);
            $res->go();
        } else {
            trigger_error('Invalid route', E_USER_ERROR);
        }
    }
}
