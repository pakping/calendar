<?php
session_start();
require '../DB/connect.php';
if (isset($_SESSION)) {
    if ($content =='everyone'){
        if ($_SESSION['type']=='user' || 'admin'){
            $sql = "UPDATE user SET LastUpdate = NOW() WHERE Username = '" . $_SESSION["Username"] . "' ";
            $query = mysqli_query($con, $sql);
        }else{
            echo '<script>alert("You are not logged in")
                window.location.href ="../index.php"</script>';
        }
    }else{
        if ($_SESSION['type'] == 'admin') {
            $sql = "UPDATE user SET LastUpdate = NOW() WHERE Username = '" . $_SESSION["Username"] . "' ";
            $query = mysqli_query($con, $sql);

            if ($content == 'user') {
                header("location:../admin/view-room.php");
            }
        }
        //if user login check session and display user content
        elseif ($_SESSION['type'] == 'user') {
            $sql = "UPDATE user SET LastUpdate = NOW() WHERE Username = '" . $_SESSION["Username"] . "' ";
            $query = mysqli_query($con, $sql);

            if ($content == 'admin') {
                echo '<script>alert("You are not authorized to access this page")
                window.location.href ="../app/home.php"</script>';
            }
        } else {
            echo '<script>alert("You are not logged in")
                window.location.href ="../index.php"</script>';
        }
    }
}
