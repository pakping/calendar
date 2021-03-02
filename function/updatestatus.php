<?php
session_start();
require '../app/dbconnect.php';
require '../DB/connect.php';
$idevent = $_POST['idstatus'];
$idstat = $_POST['idstat'];
echo $idevent;
echo $idstat;

$sql1 = "UPDATE tbl_event SET statid='$idstat' Where event_id = '$idevent'";
mysqli_query($con,$sql1);

echo '<script> alert("Update status successfully")
window.location.href ="../admin/statusroomadmin.php"
</script>'
?>