<?php

namespace Core;

interface InterfaceRouter
{
    public function addRoute(string $req, string $res);
    public function removeRoute(string $route,);
    public function run();
}
