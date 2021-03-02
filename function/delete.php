<!-- delete -->
<?php
session_start();
require '../app/dbconnect.php';
require '../DB/connect.php';
$idevent = $_POST['idevent'];
echo $idevent;
$sql1 ="DELETE From tbl_event where event_id = '$idevent'";
mysqli_query($con,$sql1);
echo '<script> alert("Delete record successfully")
window.location.href ="../app/statusroom.php"
</script>'


?>
