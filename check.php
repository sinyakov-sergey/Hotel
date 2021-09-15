<?php

    session_start();
    $clientid = $_SESSION["user_id"];
    $in = $_SESSION['in'];
    $out = $_SESSION['out'];
    $room = $_SESSION['room'];

    $conn = mysqli_connect('localhost','sinjakov_s_m','NewPass21','sinjakov_s_m');
    $sql = "INSERT INTO `booking`(`clientid`, `checkin`, `checkout`, `roomid`) VALUES ('$clientid','$in','$out','$room');";
    mysqli_query($conn, $sql);

    require_once('history.php');
    exit();

?>