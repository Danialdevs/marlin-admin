<?php
require __DIR__ . '/includes/db.php';
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!isset($_POST['login']) && !isset($_POST['password'])){
        $_SESSION['error'] = "Неверный логин или пароль";
    }

    $user = $pdo->query("SELECT * FROM users WHERE login = '{$_POST['login']}'")->fetch();


    if ($user && password_verify($_POST['password'], $user['password'])){
        $_SESSION['user'] = $user;

        header("location: posts/list.php");
        exit();
    }else{
        $_SESSION['error'] = "Неверный логин или пароль";
        header("location: login.php");
        exit();
    }

}
$_SESSION['error'] = "Неверный логин или пароль";
header("location: login.php");
exit();