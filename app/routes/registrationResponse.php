<?php

namespace Response;

use Core\Response;
use Core\Session;

class registrationResponse extends Response
{
    public function go()
    {
        if ($this->method == "GET") {
            $session = new Session();
            if (!$session->userExists()) {
                header("Location: http://localhost/");
                die();
            } else {
                header("Location: http://localhost/app/views/registration.php");
                die();
            }
        }
    }
}
