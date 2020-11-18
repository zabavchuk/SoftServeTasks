<?php

namespace App;
use App\Models\Book;

$data = Book::getAllBooks();

$content_view = 'task_1.php';
$title = 'Task 1';

require_once 'Views/main.php';