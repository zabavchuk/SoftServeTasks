<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/style.css">
    <title><?=$title?></title>
</head>
<body>

<a href="/" class="<?= $title ==='Task 1' ? 'disabled' : '' ?>">Task 1</a>
<a href="/App/task_2.php" class="<?= $title ==='Task 2' ? 'disabled' : '' ?>">Task 2</a>
<a href="/App/task_3.php" class="<?= $title ==='Task 3' ? 'disabled' : '' ?>">Task 3</a>
<a href="/App/task_4.php" class="<?= $title ==='Task 4' ? 'disabled' : '' ?>">Task 4</a>
<a href="/App/task_5.php" class="<?= $title ==='Task 5' ? 'disabled' : '' ?>">Task 5</a>
<?php require_once $content_view; ?>
</body>
</html>