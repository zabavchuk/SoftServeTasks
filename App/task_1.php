<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 12.11.2020
 * Time: 0:19
 */

namespace App;

use PDO;
require_once(__DIR__.'\..\vendor\autoload.php');

$query = 'SELECT * FROM books';
$result = Database::getInstance()->pdo->prepare($query);
$result->execute(array(':books' => 'query'));
$data = $result->fetchAll(PDO::FETCH_ASSOC);

$content_view = 'task_1.php';
$title = 'Task 1';

include 'views/main.php';