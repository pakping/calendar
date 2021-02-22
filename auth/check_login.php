<?php
	session_start();

	require_once("../DB/connect.php");
	
	$strUsername = $_POST['uname'];
	$strPassword = hash('md5',$_POST['psw']);
	echo $strPassword.'<br>';
	$strSQL = "SELECT * FROM user WHERE Username = '".$strUsername."' 
	and Password = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
?>
		<script>	
		alert("ชื่อผู้ใช้หรือรหัสผ่านผิด");
		window.location.assign("../index.php");
			</script>
<?php
		
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
			if (strcasecmp($_POST["uname"],$objResult["Username"]) == 0){
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
		window.location.assign("../index.php");
			</script>
	
	
<?php 	}
		}
	}
	mysqli_close($con);
?>