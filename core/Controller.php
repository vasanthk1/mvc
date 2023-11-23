<?php

namespace Core;

class Controller {
    protected $config;

    // public function __construct($config) {
    //     $this->config = $config;
    // }

    public function setConfig($config) {
        $this->config = $config;
    }

    public function loadView($viewName) {
        $viewPath = 'app/views/' . str_replace('/', DIRECTORY_SEPARATOR, $viewName) . '.php';

        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "View not found: $viewPath";
        }
    }
}
