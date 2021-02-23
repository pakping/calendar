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
$filepath = "../img/roomimg/" . $filename ;
$filetype = $_FILES['resume']['type'];
echo $filetype;
/* move_uploaded_file($filetmp, $filepath);
rename("$filepath",)
$sql = "INSERT INTO room (roomname,roomcap,com,screen,mic) Value ('$roomname','$roomcap','$com','$screen','$mic')";
$result=mysqli_query($con,$sql);
if ($result){
    echo '<script>alert("New data inserted")
            window.location.href ="../admin/insert-room.php"</script>';
} */

?>