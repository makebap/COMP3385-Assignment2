<?php

namespace Core;

class Session
{
    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    }

    public function userExists()
    {
        if (!isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public function setUser($user)
    {
        $_SESSION['user']['role'] = $user['role'];
        $_SESSION['user']['username'] = $user['username'];
        $_SESSION['user']['email'] = $user['email'];
    }

    public function setApp($app)
    {
        $_SESSION['app'] = $app;
    }

    public function unsetUser()
    {
        session_destroy();
        session_abort();
    }
}
