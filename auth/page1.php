<?php
	session_start();
	require_once("connect.php");

	if(!isset($_SESSION['Username']))
	{
		echo "Please Login!";
		exit();
	}
	
	//*** Update Last Stay in Login System
	$sql = "UPDATE User SET LastUpdate = NOW() WHERE Username = '".$_SESSION["Username"]."' ";
	$query = mysqli_query($con,$sql);

	//*** Get User Login
	$strSQL = "SELECT * FROM User WHERE Username = '".$_SESSION['Username']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<html>
<head>
<title>ThaiCreate.Com Tutorials</title>
</head>
<body>
  Welcome to Page 1 ! <br>
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197"><?php echo $objResult["Username"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Name</td>
        <td><?php echo $objResult["Username"];?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <a href="page2.php">Page 2</a><br>
  <br>
  <a href="logout.php">Logout</a>
</body>
</html>
<?
	mysqli_close($con);
?>