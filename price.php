<?php
    $mysql = new mysqli('localhost','sinjakov_s_m','NewPass21','sinjakov_s_m');

    $res = $mysql->query("SELECT * FROM `rooms`;");

    $answer = $res->fetch_assoc();
    $first = $answer["price"];
    $answer = $res->fetch_assoc();
    $second = $answer["price"];
    $answer = $res->fetch_assoc();
    $third = $answer["price"];

    $mysql->close();

    require_once('rooms.html');
    exit();

?>