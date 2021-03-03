<!-- delete -->
<?php
session_start();
require '../app/dbconnect.php';
require '../DB/connect.php';
$idevent = $_POST['id_event'];
echo $idevent;
$sql1 = "DELETE From tbl_event where event_id = '$idevent'";
mysqli_query($con, $sql1);
if ($_SESSION['type'] == 'admin') {
    echo '<script> alert("Delete record successfully")
window.location.href ="../admin/statusroomadmin.php"
</script>';
} else {
    echo '<script> alert("Delete record successfully")
window.location.href ="../app/statusroom.php"
</script>';
}



?>