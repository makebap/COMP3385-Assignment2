<?php

namespace Response;

use Core\Session;
use Core\Response;

class dashboardResponse extends Response
{
    public function go()
    {
        $session = new Session();
        if ($this->method == "GET") {
            if (!$session->userExists()) {
                header("Location: http://localhost/");
                die();
            } else {
                header("Location: http://localhost/app/routes/dashboard.php");
                die();
            }
        }
    }
}
