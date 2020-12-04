<?php
    
session_start();

require_once __DIR__ . '/Classes/Database.php';

$login = $_POST['login'];
$password = $_POST['password'];

$userInfo = \App\Database::select(
    'users',
    'password, name',
    'login = :login',
    [
        [':login', $login]
    ]
)[0];

if (! password_verify($password, $userInfo['password'])) {
    header('Location: /signin?error=Неверный+логин+или+пароль');
    
    die();
}

$_SESSION['username'] = $userInfo['name'];
$_SESSION['login'] = $login;

header('Location: /');