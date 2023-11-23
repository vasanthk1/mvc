<?php
require_once 'vendor/autoload.php';

class Router {
    protected $config;

    public function __construct() {
        $this->config = require_once('app/config.php');
    }

    public function route() {
        // Parse the URL and determine the controller and method
        // Example: /controller/method/param1/param2
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');
        $segments = explode('/', $uri);

        // Check for base URL match
        $baseUrl = $this->config['base_url'];
        $baseSegments = explode('/', trim($baseUrl, '/'));

        // Remove base segments from the URL
        $segments = array_diff($segments, $baseSegments);

        // Extract controller, method, and parameters
        // $controllerName = ucfirst(array_shift($segments)) . 'Controller';
        $controllerName = 'Controllers\\' . ucfirst(array_shift($segments)) . 'Controller';

        $methodName = array_shift($segments);

        // If no controller or method specified, default to HomeController@index
        if (empty($controllerName)) {
            $controllerName = 'HomeController';
            $methodName = 'index';
        }

        if (empty($methodName)) {
            $methodName = 'index';
        }
        
        // Include the controller file
        // require_once 'app/controllers/' . $controllerName . '.php';
        // echo $controllerName;die();
        // Create an instance of the controller
        $controller = new $controllerName();
        
        // Instantiate the controller with the configuration
        // $controller = new HomeController();


        // If the controller extends the base Controller, pass the config
        if ($controller instanceof Controller) {
            $controller->setConfig($this->config);
        }
        
        // Call the method with parameters
        call_user_func_array([$controller, $methodName], $segments);
    }
}
