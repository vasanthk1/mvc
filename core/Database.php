<?php
// core/Database.php

namespace Core;

class Database {
    protected $pdo;

    public function __construct($config) {
        $dsn = "mysql:host={$config['db_host']};dbname={$config['db_name']};charset=utf8";
        $this->pdo = new \PDO($dsn, $config['db_user'], $config['db_password']);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getPdo() {
        return $this->pdo;
    }
}
