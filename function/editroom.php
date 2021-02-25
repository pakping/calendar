<?php
session_start();
require '../DB/connect.php';
$roomid = $_POST['roomid'];
$roomname = $_POST['roomname'];
$roomcap = $_POST['roomcap'];
$com = $_POST['com'];
$screen = $_POST['screen'];
$mic = $_POST['mic'];

$sql = "Update room set roomname ='$roomname' , roomcap='$roomcap' , com='$com' , screen='$screen', mic='$mic',roomimg='$newpath' WHERE roomid = '$roomid'";
/* mysqli_query($con,$sql);
$sql = "Alter Table '$roomname'"; */
$result=mysqli_query($con,$sql);
if ($result){
    echo '<script>alert("Data updated")
        window.location.href ="../admin/view-room.php"</script>';
}else{
    echo '<script>alert("Fail to update")
        window.location.href ="../admin/Edit-room.php"</script>';
}

?>