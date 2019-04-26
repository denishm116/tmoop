<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">

    <title>Show</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

    <style>

    </style>
</head>

<body>

<div class="form-wrapper text-center">
    <h1>Задача ИД <?php echo $vars['id']; ?></h1>
    <img src="/uploads/<?php echo $vars['img']; ?>" alt="" width="400">
    <h2><?php echo  $vars['title']; ?></h2>
    <p>
        <?php echo  $vars['short_description']; ?>
    </p>

    <p>
        <?php echo  $vars['description']; ?>
    </p>
</div>

</body>
</html>