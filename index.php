<?php
require_once 'vendor/autoload.php';
// $controller = new HomeController();
require_once 'core/Router.php';

$router = new Router();
$router->route();
