<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">

    <title>Error</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

    <style>

    </style>
</head>

<body>
<div class="container text-center mt-5">
    <h1><?php echo $vars['error']; ?></h1>
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Назад</a>
</div>
</body>
</html>
