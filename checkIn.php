<?php

    $_SESSION = [];
    $login = filter_var(trim($_POST['login1']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass1']), FILTER_SANITIZE_STRING);
    $er1 = '';

    if (mb_strlen($login) == 0){
        $er1 = "неверный логин";
        require_once('index.html');
        exit();
    } else if (mb_strlen($pass) == 0){
        $er1 = "неверный пароль";
        require_once('index.html');
        exit();
    }

    $pass = md5($pass);
    $mysql = new mysqli('localhost','sinjakov_s_m','NewPass21','sinjakov_s_m');

    $res = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' and `pass` = '$pass';");
    $answer = $res->fetch_assoc();
    if (count($answer) == 0){
        $er1 = "неверный логин или пароль";
        require_once('index.html');
        exit();
    }
    $res1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login';");

    $answer1 = $res1->fetch_assoc();
    session_start();
    $_SESSION["user_id"] = $answer1["id"];
    $_SESSION["name"] = $answer1["name"];

    $mysql->close();

    if ($answer["priv"] == 2){
        header('Location: reservations.php');
    }elseif ($answer["priv"] == 1){
        header('Location: controller.html');
    }else{
        header('Location: price.php');
    }
?>