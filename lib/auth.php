<?php
session_start();

// Статические логин/пароль (как требует задание)
$STATIC_LOGIN = "admin";
$STATIC_PASS = "12345";

$login = trim($_POST['login'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($login === $STATIC_LOGIN && $password === $STATIC_PASS) {
    $_SESSION['user'] = $login;
    $_SESSION['message'] = " Успешный вход!";
    $_SESSION['msg_type'] = 'success';
} else {
    $_SESSION['message'] = " Неверный логин или пароль";
    $_SESSION['msg_type'] = 'error';
}

// Возврат на страницу авторизации
header("Location: /auth.php");
exit;
