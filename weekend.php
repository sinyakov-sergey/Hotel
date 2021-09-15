<?php

    session_start();
    $id = $_SESSION['user_id'];
    $day = $_POST['day'];

    $mysql = new mysqli('localhost','sinjakov_s_m','NewPass21','sinjakov_s_m');

    $res = $mysql->query("SELECT * FROM `booking` WHERE `checkin` <= '$day' and `checkout` >= '$day'");
    $a = $res->fetch_assoc();

    $res1 = $mysql->query("SELECT * FROM `rooms`;");

    $answer = $res1->fetch_assoc();
    $first = $answer["count"];
    $answer = $res1->fetch_assoc();
    $second = $answer["count"];
    $answer = $res1->fetch_assoc();
    $third = $answer["count"];
    $answer = "";

    if (count($a) == 0){
        for ($i = 0; $i < $first; $i = $i + 1){
            $mysql->query("INSERT INTO `booking`(`clientid`, `checkin`, `checkout`, `roomid`) VALUES ('$id','$day','$day',1);");
        }
        for ($i = 0; $i < $second; $i = $i + 1){
            $mysql->query("INSERT INTO `booking`(`clientid`, `checkin`, `checkout`, `roomid`) VALUES ('$id','$day','$day',2);");
        }
        for ($i = 0; $i < $third; $i = $i + 1){
            $mysql->query("INSERT INTO `booking`(`clientid`, `checkin`, `checkout`, `roomid`) VALUES ('$id','$day','$day',3);");
        }
        $answer2 = "успешно";
    }else $answer2 = "невозможно закрыть отель";


    require_once('controller.html');
    exit();

?>