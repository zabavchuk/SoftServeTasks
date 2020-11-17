<?php
/**
 * Created by PhpStorm.
 * User: Данило
 * Date: 15.11.2020
 * Time: 22:11
 */

namespace App;

use PDO;
use Configs\ConfigDB;

class Database
{
    protected static $instance = null;
    public $pdo = null;

    private function __construct() {
        try {
            $dsn = 'mysql:host='.ConfigDB::DB_HOST.';dbname='. ConfigDB::DB_NAME.';charset='.ConfigDB::DB_CHARSET;
            $this->pdo = new PDO($dsn, ConfigDB::DB_USER, ConfigDB::DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->query("SET NAMES ". ConfigDB::DB_CHARSET);
            $this->pdo->query("SET CHARACTER SET ". ConfigDB::DB_CHARSET);

//            self::$instance = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
//            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            self::$instance->query("SET NAMES ".Config::DB_CHARSET);
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