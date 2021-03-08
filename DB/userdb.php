<?php

ini_set('display_errors', 1);
error_reporting(~0);

$serverName	  = "localhost";
$userName	  = "root";
$userPassword	  = "";
$dbName	  = "Userinfo";

$con = mysqli_connect($serverName, $userName, $userPassword, $dbName);
$con->set_charset('utf8');

if (mysqli_connect_errno()) {
	echo "Database Connect Failed : " . mysqli_connect_error();
	exit();
}

//*** Reject user not online
$intRejectTime = 20; // Minute
$sql = "UPDATE User SET LoginStatus = '0', LastUpdate = '0000-00-00 00:00:00'  WHERE 1 AND DATE_ADD(LastUpdate, INTERVAL $intRejectTime MINUTE) <= NOW() ";
$query = mysqli_query($con, $sql);
