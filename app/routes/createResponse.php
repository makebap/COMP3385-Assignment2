<?php

namespace Response;

use Core\Response;

class createResponse extends Response
{
    public function go()
    {
        if ($this->method == "GET") {
            header("Location: http://localhost/app/routes/newUser.php");
            die();
        }
    }
}
