<?php

    $price = filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING);
    $room = $_POST['room'];

    $conn = mysqli_connect('localhost','sinjakov_s_m','NewPass21','sinjakov_s_m');
    $sql = "UPDATE `rooms` SET `price`='$price' WHERE `id`='$room';";
    if (mysqli_query($conn, $sql)){
        $answer = "успешно";
    }else $answer = "неверный формат";

    require_once('controller.html');
    exit();

?>