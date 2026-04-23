<?php
session_start();
session_unset();
session_destroy();
$_SESSION['message'] = " Вы вышли из системы";
$_SESSION['msg_type'] = 'info';
header("Location: /auth.php");
exit;