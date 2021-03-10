<?php
session_start();
require '../DB/connect.php';
$idevent = $_POST['idstatus'];
$idstat = $_POST['idstat'];
echo $idevent;
echo $idstat;

$sql1 = "UPDATE cars_event SET statid='$idstat' Where event_id = '$idevent'";
mysqli_query($con,$sql1);
if ($_SESSION['type']=='admin'){
echo '<script> alert("Update status successfully")
window.location.href ="../admin/statusroomadmin.php"
</script>';
}else if ($_SESSION['type']=='user'){
    echo '<script> alert("Update status successfully")
window.location.href ="../app/statusroom.php"
</script>';
}

?>