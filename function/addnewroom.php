<?php
session_start();
require '../DB/connect.php';
$roomname = $_POST['roomname'];
$roomcap = $_POST['roomcap'];
$com = $_POST['com'];
$screen = $_POST['screen'];
$mic = $_POST['mic'];

$filename = $_FILES['resume']['name'];
$filetmp = $_FILES['resume']['tmp_name'];
$path = "../img/roomimg/";
$filepath = "../img/roomimg/" . $filename ;
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$namenoext = basename($filepath,"." . $ext);

echo $ext . '<br>';
echo $filetmp . '<br>';
echo basename($filepath,"." . $ext);

if (move_uploaded_file($filetmp, $filepath)){
    $newpath = $path . "title_img" . $roomname . "." . $ext ;
    echo $newpath;
    rename($filepath,$newpath);
    $sql = "INSERT INTO room (roomname,roomcap,com,screen,mic,roomimg) Value ('$roomname','$roomcap','$com','$screen','$mic','$newpath')";
    /* mysqli_query($con,$sql);
    $sql2 = "CREATE TABLE `$roomname` (
        `event_id` int(11) NOT NULL,
        `event_title` varchar(256) NOT NULL,
        `event_detail` text NOT NULL,
        `event_startdate` date NOT NULL,
        `event_enddate` date NOT NULL,
        `event_starttime` time NOT NULL,
        `event_endtime` time NOT NULL,
        `event_color` varchar(15) NOT NULL DEFAULT '#FFFFFF',
        `event_bgcolor` varchar(15) NOT NULL DEFAULT '#03a9f4',
        `event_url` varchar(300) NOT NULL,
        `event_repeatday` varchar(20) NOT NULL,
        `event_allday` tinyint(1) NOT NULL,
        `event_createdate` timestamp NOT NULL DEFAULT current_timestamp(),
        `people` int(3) NOT NULL,
        `description` text NOT NULL,
        `reguser` varchar(255) NOT NULL,
        `tool` int(1) NOT NULL,
        `Scup` int(3) NOT NULL,
        `Bcup` int(3) NOT NULL,
        `longcup` int(3) NOT NULL,
        `drinkcup` int(3) NOT NULL,
        `softdrink` int(3) NOT NULL,
        `othercup` varchar(20) NOT NULL,
        `hotbot` int(3) NOT NULL,
        `tray` int(3) NOT NULL,
        `dishcup` int(3) NOT NULL,
        `jug` int(3) NOT NULL,
        `boxcup` int(3) NOT NULL,
        `tea` int(3) NOT NULL,
        `boiler` int(3) NOT NULL,
        `basket` int(3) NOT NULL,
        `other` varchar(20) NOT NULL
      )"; */
    $result=mysqli_query($con,$sql);
    if ($result){
        echo '<script>alert("New data inserted")
                window.location.href ="../admin/insert-room.php"</script>';
    }
}
?>