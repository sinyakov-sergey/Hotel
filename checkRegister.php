<?php

  $_SESSION = [];
  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
  $er = '';

  if (mb_strlen($login) == 0){
    $er = "недопустимая длина логина";
    require_once('index.html');
    exit();
  } else if (mb_strlen($name) == 0){
    $er = "недопустимая длина имени";
    require_once('index.html');
    exit();
  } else if (mb_strlen($pass) == 0){
    $er = "недопустимая длина пароля";
    require_once('index.html');
    exit();
  }

  $pass = md5($pass);
  $mysql = new mysqli('localhost','sinjakov_s_m','NewPass21','sinjakov_s_m');

  $res = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
  $answer = $res->fetch_assoc();
  if (count($answer) != 0){
    $er = "пользователь с таким логином уже существует";
    require_once('index.html');
    exit();
  }

  $mysql->query("INSERT INTO `users`(`login`, `pass`, `name`, `priv`) VALUES ('$login','$pass','$name',0)");

  $res1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login';");

  $answer1 = $res1->fetch_assoc();
  session_start();
  $_SESSION["user_id"] = $answer1["id"];
  $_SESSION["name"] = $answer1["name"];

  $mysql->close();

  header('Location: price.php');
?>
