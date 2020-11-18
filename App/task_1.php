<?php

namespace App;

$data = Book::getAllBooks();

$content_view = 'task_1.php';
$title = 'Task 1';

require_once 'views/main.php';