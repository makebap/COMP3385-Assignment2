<?php

namespace Response;

use Core\Response;

class indexResponse extends Response
{
    public function go()
    {
        if ($this->method == "GET") {
            header("Location: http://localhost/app/views/index.php");
            die();
        }
    }
}
