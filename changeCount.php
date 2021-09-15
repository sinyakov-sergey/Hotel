<?php

    $count = filter_var(trim($_POST['count']), FILTER_SANITIZE_STRING);
    $room = $_POST['room1'];

    $conn = mysqli_connect('localhost','sinjakov_s_m','NewPass21','sinjakov_s_m');
    $sql = "UPDATE `rooms` SET `count`='$count' WHERE `id`='$room';";
    if (mysqli_query($conn, $sql)){
        $answer1 = "успешно";
    }else $answer1 = "неверный формат";

    require_once('controller.html');
    exit();

?>