<?php
session_start();
require_once 'db.php';

$login    = trim($_POST['login'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($login) || empty($password)) {
    $_SESSION['message'] = "Заполните все поля";
    $_SESSION['msg_type'] = 'error';
    header("Location: /auth.php");
    exit;
}


$stmt = $pdo->prepare("SELECT id, name, password FROM users WHERE email = ? OR name = ?");
$stmt->execute([$login, $login]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && md5($password) === $user['password']) {
    $_SESSION['user'] = $user['name'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['message'] = "Успешный вход!";
    $_SESSION['msg_type'] = 'success';
} else {
    $_SESSION['message'] = "Неверный логин или пароль";
    $_SESSION['msg_type'] = 'error';
}

header("Location: /auth.php");
exit;
?>