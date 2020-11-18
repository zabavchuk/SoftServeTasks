<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/style.css">
    <title><?=$title?></title>
</head>
<body>

<h1>SoftServe Tasks</h1>

<a href="/" class="link <?= $title ==='Task 1' ? 'active' : '' ?>">Task 1</a>
<a href="/App/task_2.php" class="link <?= $title ==='Task 2' ? 'active' : '' ?>">Task 2</a>
<a href="/App/task_3.php" class="link <?= $title ==='Task 3' ? 'active' : '' ?>">Task 3</a>
<a href="/App/task_4.php" class="link <?= $title ==='Task 4' ? 'active' : '' ?>">Task 4</a>
<a href="/App/task_5.php" class="link <?= $title ==='Task 5' ? 'active' : '' ?>">Task 5</a>

<?php require_once $content_view; ?>
</body>
</html>