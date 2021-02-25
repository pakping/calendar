<?php
session_start();
require '../DB/connect.php';
$id = $_POST['delid'];
$name ='0';
$sql1 ="Select * From room where roomid = '$id'";
if ($result = mysqli_query($con, $sql1)) {
    while ($ok = mysqli_fetch_array($result)) {
        unlink($ok["roomimg"]);
        $name = $ok['roomname'];
    }
}
$sql2="delete from room where roomid ='$id'";
mysqli_query($con,$sql2);
echo '<script> alert("Delete record successfully")
window.location.href ="../admin/view-room.php"
</script>'

?>