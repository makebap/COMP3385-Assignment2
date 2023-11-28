<?php

namespace Core;

abstract class Response
{
    protected $method;
    public function __construct($method)
    {
        $this->method = $method;
    }
    abstract public function go();
}
