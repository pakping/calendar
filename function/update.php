<!-- update -->
<?php
session_start();
require '../app/dbconnect.php';
require '../DB/connect.php';
$eid = $_POST['eid'];
$p_event_title = (isset($_POST['event_title'])) ? $_POST['event_title'] : "";
$p_event_startdate = (isset($_POST['event_startdate'])) ? $_POST['event_startdate'] : "0000-00-00";
$p_event_enddate = (isset($_POST['event_enddate'])) ? $_POST['event_enddate'] : "0000-00-00";
$p_event_starttime = (isset($_POST['event_starttime'])) ? $_POST['event_starttime'] : "00:00:00";
$p_event_endtime = (isset($_POST['event_endtime'])) ? $_POST['event_endtime'] : "00:00:00";
$p_event_repeatday = (isset($_POST['event_repeatday'])) ? $_POST['event_repeatday'] : "";
$p_event_allday = (isset($_POST['event_allday'])) ? 1 : 0;
$peoplenum =  $_POST['people'];
$description = $_POST['desc'];
$regname = $_POST['reg'];
$tool = $_POST['tool'];
if (isset($_POST['coffeesmallcup'])) {
    $Scup = $_POST['Scup'];
} else {
    $Scup = '0';
}
if (isset($_POST['coffeebigcup'])) {
    $Bcup = $_POST['Bcup'];
} else {
    $Bcup = '0';
}
if (isset($_POST['islongcup'])) {
    $longcup = $_POST['longcup'];
} else {
    $longcup = '0';
}
if (isset($_POST['isdrinkcup'])) {
    $drinkcup = $_POST['drinkcup'];
} else {
    $drinkcup = '0';
}
if (isset($_POST['issoftdrink'])) {
    $softdrink = $_POST['softdrink'];
} else {
    $softdrink = '0';
}
if (isset($_POST['isothercup'])) {
    $othercup = $_POST['othercup'];
} else {
    $othercup = 'none';
}
if (isset($_POST['ishotbot'])) {
    $hotbot = $_POST['hotbot'];
} else {
    $hotbot = '0';
}
if (isset($_POST['istray'])) {
    $tray = $_POST['tray'];
} else {
    $tray = '0';
}
if (isset($_POST['isdishcup'])) {
    $dishcup = $_POST['dishcup'];
} else {
    $dishcup = '0';
}
if (isset($_POST['isjug'])) {
    $jug = $_POST['jug'];
} else {
    $jug = '0';
}
if (isset($_POST['isboxcup'])) {
    $boxcup = $_POST['boxcup'];
} else {
    $boxcup = '0';
}
if (isset($_POST['istea'])) {
    $tea = $_POST['tea'];
} else {
    $tea = '0';
}
if (isset($_POST['isboiler'])) {
    $boiler = $_POST['boiler'];
} else {
    $boiler = '0';
}
if (isset($_POST['isbasket'])) {
    $basket = $_POST['basket'];
} else {
    $basket = '0';
}
if (isset($_POST['isothertool'])) {
    $other = $_POST['other'];
} else {
    $other = 'none';
}
$roomname = $_POST['roomname'];
$bgcolor = '0';
$roomid = '0';
$sqlq = "Select * from room where roomname = '$roomname'";
if ($result = mysqli_query($con, $sqlq)) {
    while ($ok = mysqli_fetch_array($result)) {
        $bgcolor = $ok['bgcolor'];
        $roomid = $ok['roomid'];
    }
}
$sql = "
    Update tbl_event SET 
    event_title='" . $p_event_title . "',
    roomid ='" . $roomid . "',
    event_startdate='" . $p_event_startdate . "',
    event_enddate='" . $p_event_enddate . "',
    event_starttime='" . $p_event_starttime . "',
    event_endtime='" . $p_event_endtime . "',
    event_repeatday='" . $p_event_repeatday . "',
    event_allday='" . $p_event_allday . "',
    event_bgcolor='" . $bgcolor . "',
    people='" . $peoplenum . "',
    description='" . $description . "',
    reguser='" . $regname . "',
    tool='" . $tool . "',
    Scup='" . $Scup . "',
    Bcup='" . $Bcup . "',
    longcup='" . $longcup . "',
    drinkcup='" . $drinkcup . "',
    softdrink='" . $softdrink . "',
    othercup='" . $othercup . "',
    hotbot='" . $hotbot . "',
    tray='" . $tray . "',
    dishcup='" . $dishcup . "',
    jug='" . $jug . "',
    boxcup='" . $boxcup . "',
    tea='" . $tea . "',
    boiler='" . $boiler . "',
    basket='" . $basket . "',
    other='" . $other . "'
    Where event_id = '$eid'";
    echo $sql;
if ($mysqli->query($sql)) {
    /* echo $sql; */
    /* exit; */
    echo '<script>alert("New data inserted")
                window.location.href ="../app/calendar.php"</script>';
}

?>