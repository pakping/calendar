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
    $result=mysqli_query($con,$sql);
    if ($result){
        echo '<script>alert("New data inserted")
                window.location.href ="../admin/insert-room.php"</script>';
    }
}
?>