<?php
global $pdo;
$login = trim(filter_var( $_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$username = trim(filter_var( $_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$email = trim(filter_var( $_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$password = trim(filter_var( $_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));

if(strlen($login) < 2){
    echo "Login error";
    exit;
}

if(strlen($username) < 1){
    echo "Name error";
    exit;
}

if (strlen($password) < 2){
    echo "Password error";
    exit;
}

if (strlen($email) < 2){
    echo "Email error";
    exit;
}



//Password
$salt = '56s89_vdtgrgrdgdg[drgd';
$password =md5($salt . $password);

//БД

require "db.php";

//INSERT
$sql = 'INSERT INTO users(login, username, email, password) VALUES(?,?,?,?)';
$query = $pdo->prepare($sql);
$query->execute([$login, $username, $email, $password]);

header('location: /');