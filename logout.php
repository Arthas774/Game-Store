<?php
session_start();

// Устанавливаем куки-сообщение (альтернатива сессии для редиректа)
setcookie('flash_message', ' Вы вышли из системы', time() + 10, '/');
setcookie('flash_type', 'info', time() + 10, '/');

session_unset();
session_destroy();

header("Location: /auth.php");
exit;