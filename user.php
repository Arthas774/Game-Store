<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кабинет пользователя</title>
    <link rel="stylesheet" href="1.css">
</head>

<body>
<?php require_once "blocks/header.php" ?>

<div class="feedback">
    <div class="container">
        <h2>Кабинет пользователя</h2>
        <p>Привет <?php echo $_COOKIE['login'];?>. </p>


    </div>
</div>

<footer>
    <p>© 2025 GameStore. Все права защищены.</p>
</footer>
</body>

</html>