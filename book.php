<?php


    session_start();
    $clientid = $_SESSION["user_id"];

    $in = $_POST['in'];
    $out = $_POST['out'];
    $room = $_POST['room'];


    if ($in > $out || $in < date("Y-m-d")){
        $book = "неправильно введенные даты";
        require_once('booking.html');
        exit();
    }
    $mysql = new mysqli('localhost','sinjakov_s_m','NewPass21','sinjakov_s_m');

    $rooms = $mysql->query("SELECT * FROM `rooms` WHERE `id` = '$room';");
    $row = $rooms->fetch_assoc();
    $count = $row['count'];


    $sql = mysqli_query($mysql, "SELECT * FROM `booking` WHERE `roomid` = '$room';");
    if ($count == 0) $book = "все занято";
    else $book = "есть номер";
    while ($result = mysqli_fetch_array($sql) && $count != 0) {
        $book = "все занято";
        if ($result["checkin"] > $out || $result["checkout"] < $in){
            $book = "есть номер";
            break;
        } else{
            $count = $count - 1;
        }
    }

    require_once('booking.html');
    if ($book = "есть номер") {
        echo "<a class=\"active\" href=\"check.php\" 
           style='background-color: #4CAF50; color: white; text-decoration: none; margin: 90px;
           text-align: center; padding: 9px 11px; font-size: 17px; border-radius: 7%;'>Забронировать</a>";
        $_SESSION['in'] = $in;
        $_SESSION['out'] = $out;
        $_SESSION['room'] = $room;
    }
    exit();
?>