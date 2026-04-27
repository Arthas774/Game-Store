<?php
session_start();


if (!isset($_SESSION['user'])) {
    header("Location: auth.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кабинет пользователя - GameStore</title>
    <link rel="stylesheet" href="1.css">
</head>
<body>
<?php require_once "blocks/header.php"; ?>

<div class="feedback">
    <div class="container">
        <h2>Кабинет пользователя</h2>

        <p>Привет, <strong><?= htmlspecialchars($_SESSION['user']) ?></strong>!</p>


        <a href="logout.php" class="btn"
           style="background-color: #c0392b; color: white; padding: 12px 25px;
                      text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 15px;">
            Выйти из аккаунта
        </a>
    </div>
</div>

<footer>
    <p>© 2025 GameStore. Все права защищены.</p>
</footer>
</body>
</html>