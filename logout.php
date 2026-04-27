<?php
session_start();
session_destroy();


unset($_SESSION['user'], $_SESSION['user_id'], $_SESSION['message'], $_SESSION['msg_type']);

$_SESSION['message'] = "Вы успешно вышли из системы";
$_SESSION['msg_type'] = "success";

header("Location: auth.php");
exit;
?>