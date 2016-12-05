<?php

class Config
{
    protected $config;

    function __construct()
    {
        $this->config = parse_ini_file('config.ini', true);
    }

    public function loadConfig()
    {
        return $this->config;
    }
}