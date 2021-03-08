<?php
	session_start();

	require_once("../DB/userdb.php");

	//*** Update Status
	$sql = "UPDATE User SET LoginStatus = '0', LastUpdate = '0000-00-00 00:00:00' WHERE Username = '".$_SESSION["Username"]."' ";
	$query = mysqli_query($con,$sql);

	session_destroy();
	echo '<script>alert("Logged out successfully!")
    		window.location.href ="../index.php"</script>';
?>