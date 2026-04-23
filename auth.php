<?php
session_start();

if (isset($_COOKIE['flash_message'])) {
    $message = $_COOKIE['flash_message'];
    $msg_type = $_COOKIE['flash_type'] ?? 'info';
    // Удаляем куки
    setcookie('flash_message', '', time() - 3600, '/');
    setcookie('flash_type', '', time() - 3600, '/');
}
$message = $_SESSION['message'] ?? '';
$msg_type = $_SESSION['msg_type'] ?? '';
unset($_SESSION['message'], $_SESSION['msg_type']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="1.css">
</head>
<body>
<?php require_once "blocks/header.php" ?>

<div class="feedback">
    <div class="container">
        <h2>Авторизация</h2>

        <!-- Сообщения -->
        <?php if ($message): ?>
            <div class="alert alert-<?= htmlspecialchars($msg_type) ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <!-- Если пользователь вошёл -->
        <?php if (isset($_SESSION['user'])): ?>
            <p> Вы вошли как <strong><?= htmlspecialchars($_SESSION['user']) ?></strong></p>
            <a href="logout.php" class="btn">Выйти</a>
        <?php else: ?>
            <!-- Форма авторизации -->
            <form method="post" action="lib/auth.php">
                <div class="inline">
                    <div>
                        <label>Логин</label>
                        <input type="text" name="login" required>
                    </div>
                    <div>
                        <label>Пароль</label>
                        <input type="password" name="password" required>
                    </div>
                </div>
                <button type="submit">Авторизоваться</button>
            </form>
        <?php endif; ?>
    </div>
</div>

<footer>
    <p>© 2025 GameStore. Все права защищены.</p>
</footer>
</body>
</html>