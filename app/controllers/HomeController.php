<?php
namespace Controllers;
use Core\Controller as Controller;

class HomeController extends Controller {
    public function index() {
        // Database connection example
        // $db = new PDO(
        //     'mysql:host=' . $this->config['database']['host'] . ';dbname=' . $this->config['database']['database'],
        //     $this->config['database']['username'],
        //     $this->config['database']['password']
        // );

        // Use $this->config as needed for database connection or other configurations
        
        // Load the view
        $this->loadView('index');
    }
}
