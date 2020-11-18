<?php

namespace App;

use PDO;
use Configs\DB;

class Database
{
    protected static $instance = null;
    public $pdo = null;

    private function __construct() {
        try {
            $dsn = 'mysql:host='.DB::DB_HOST.';dbname='. DB::DB_NAME.';charset='.DB::DB_CHARSET;
            $this->pdo = new PDO($dsn, DB::DB_USER, DB::DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->query("SET NAMES ". DB::DB_CHARSET);
            $this->pdo->query("SET CHARACTER SET ". DB::DB_CHARSET);
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function __clone() {
    }

    private function __wakeup() {
    }
}