<?php
include '../auth/Sessionpersist.php';
require '../DB/connect.php';
$roomname = $_POST['roomname'];
$sql = "INSERT INTO room (roomname) Value ('$roomname')";
mysqli_query($con,$sql);
?>