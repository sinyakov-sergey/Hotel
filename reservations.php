<?php


session_start();
$name = $_SESSION["name"];
$clientid = $_SESSION["user_id"];
require_once('reserv.html');
$mysql = new mysqli('localhost','sinjakov_s_m','NewPass21','sinjakov_s_m');

$sql = mysqli_query($mysql, "SELECT * FROM `booking` WHERE `clientid` != 9;");

echo "<h3>id - заезд - выезд - номер</h3>";
while ($result = mysqli_fetch_array($sql)) {
    echo "{$result['clientid']} - {$result['checkin']} - {$result['checkout']} - {$result['roomid']} местный<br>";
}

exit();

?>