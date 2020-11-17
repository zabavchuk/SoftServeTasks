<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 12.11.2020
 * Time: 0:19
 */

namespace App;

use PDO;
use Configs\ConfigDB;
require_once(__DIR__.'\..\Configs\ConfigDB.php');


class DB {
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
$query = 'SELECT * FROM books';
$result = DB::getInstance()->pdo->prepare($query);
$result->execute(array(':books' => 'query'));
$data = $result->fetchAll(PDO::FETCH_ASSOC);

$content_view = 'task_1.php';
$title = 'Task 1';

include 'views/main.php';