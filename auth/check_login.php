<?php
	session_start();

	require_once("connect.php");
	
	$strUsername = $_POST['uname'];
	$strPassword = $_POST['psw'];

	$strSQL = "SELECT * FROM User WHERE Username = '".$strUsername."' 
	and Password = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		echo "Username and Password Incorrect!";
		exit();
	}
	else
	{
		if($objResult["LoginStatus"] == "1")
		{
			echo "'".$strUsername."' Exists login!";
			exit();
		}
		else {
			if ($_POST["uname"] == $objResult["Username"]){
			//*** Update Status Login
			$sql = 'UPDATE User SET LoginStatus = "1" , LastUpdate = NOW() WHERE Username = $objResult["Username"]';
			$query = mysqli_query($con, $sql);
			//*** Session
			$_SESSION["Username"] = $objResult["Username"];
			if ($objResult["Access"] == "admin") {
				$_SESSION['type'] = 'admin';
				echo '<script>alert("Login Successfully!")
    				window.location.href ="../admin/view-room.php"</script>';
			} elseif ($objResult["Access"] == "user") {
				$_SESSION['type'] = 'user';
				echo '<script>alert("Login Successfully!")
    				window.location.href ="../app/home.php"</script>';
			}
		} else {
			?>
		<script>	
		alert("ชื่อผู้ใช้หรือรหัสผ่านผิด");
		window.location.assign("../app/login.php");
			</script>
	
	
		<?php }
		}
	}
	mysqli_close($con);
?>