<?php
global $pdo;
$login = trim(filter_var( $_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$password = trim(filter_var( $_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));

if(strlen($login) < 2){
    echo "Login error";
    exit;
}

if (strlen($password) < 2){
    echo "Password error";
    exit;
}

//Password
$salt = '56s89_vdtgrgrdgdg[drgd';
$password =md5($salt . $password);

//БД

require "db.php";

//Auth user

$sql = "SELECT * FROM users WHERE login = ? AND password = ?";
$query = $pdo->prepare($sql);
$query->execute([$login, $password]);

if($query->rowCount() == 0)
    echo "Login error";
else{
    setcookie("login", $login, time() + (86400 * 30), "/")  ;
    header("Location: /user.php");}


