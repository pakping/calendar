<?php
date_default_timezone_set("Asia/Bangkok");
// โค้ดไฟล์ dbconnect.php ดูได้ที่ http://niik.in/que_2398_5642
require_once("../DB/dbconnect.php");
$content = 'everyone';
include '../auth/Sessionpersist.php';
$today = date("Y-m-d");

$starttime = date("08:30:00");
$endtime = date("21:00:00");
?>
<?php
// การบันทึกข้อมูลอย่างง่ายเบื้องตั้น
if (isset($_POST['btn_add']) && $_POST['btn_add'] != "") {
    $p_event_title = (isset($_POST['event_title'])) ? $_POST['event_title'] : "";
    $p_event_startdate = (isset($_POST['event_startdate'])) ? $_POST['event_startdate'] : "0000-00-00";
    $p_event_enddate = (isset($_POST['event_enddate'])) ? $_POST['event_enddate'] : "0000-00-00";
    $p_event_starttime = (isset($_POST['event_starttime'])) ? $_POST['event_starttime'] : "00:00:00";
    $p_event_endtime = (isset($_POST['event_endtime'])) ? $_POST['event_endtime'] : "00:00:00";
    $p_event_repeatday = (isset($_POST['event_repeatday'])) ? $_POST['event_repeatday'] : "";
    $p_event_allday = (isset($_POST['event_allday'])) ? 1 : 0;
    $peoplenum =  $_POST['people'];
    $description = $_POST['desc'];

    $tool = $_POST['tool'];
    $stat = $_POST['statid'];
    if (isset($_POST['statid'])) {
        $stat = 2;
    }
    if (isset($_POST['Username'])) {
        $Username = $_POST['Username'];
    }
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
    INSERT INTO tbl_event SET
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
    event_detail='" . $description . "',
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
    statid='" . $stat . "',
    Username='" . $Username . "',
    other='" . $other . "'
    ";
    $sqla = "Select * from tbl_event where (event_startdate Between '$p_event_startdate' and '$p_event_enddate') and (event_enddate Between '$p_event_startdate' and '$p_event_enddate') and (event_starttime Between '$p_event_starttime' and '$p_event_endtime')and (event_endtime Between '$p_event_starttime' and '$p_event_endtime') and (statid ='2' or statid = '1') ";
    $result2 = mysqli_query($con, $sqla);
    /* echo $sqla; */

    if ($rowcount = mysqli_num_rows($result2) == 0) {
        if ($mysqli->query($sql)) {
            echo '<script>alert("New data inserted")
            window.location.href ="../app/form_calendar.php"</script>';
        }
    } else {
        $z = 0;
        while ($data = mysqli_fetch_array($result2)) {
            $id[$z] = $data['roomid'];
            $stime[$z] = $data['event_starttime'];
            $etime[$z] = $data['event_endtime'];

            /* echo $id[$z] . "<br>";
            echo $stime[$z] . "<br>";
            echo $etime[$z] . "<br>"; */
            $z = $z + 1;
        }
        if (in_array($roomid, $id)) {
            echo '<script>alert("วันเวลาที่เลือกไม่สามารถจองได้เนื่องจากมีผู้จองก่อนแล้ว (case1)")
            window.location.href ="../app/form_calendar.php"</script>';
        } else {
            if ($hasDuplicates = count($id) > count(array_unique($id))) {
                echo '<script>alert("วันเวลาที่เลือกไม่สามารถจองได้เนื่องจากมีผู้จองก่อนแล้ว (case2)")
                window.location.href ="../app/form_calendar.php"</script>';
            } else {
                if ($mysqli->query($sql)) {
                    echo '<script>alert("New data inserted!!")
                    window.location.href ="../app/calendar.php"</script>';
                }
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <title>UP</title>

    <?php
    include '../components/cnd.php';
    ?>
    <style type="text/css">
        .wrap-form {
            width: 800px;
            margin: auto;
        }
    </style>
</head>

<body>

    <?php
    if ($_SESSION['type'] == 'admin') {
        include '../components/navbaradmin.php';
    } else {
        include '../components/nav.php';
    }
    
    ?>
    <form action="" method="post" accept-charset="utf-8">
        <section class="section">
            <div class="box container">
                <div class="notification is-primary">
                    <strong>สร้างการประชุม</strong>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">หัวข้อกิจกรรม</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <input class="input" type="text" name="event_title" placeholder="กรอกหัวข้อการประชุม" required>

                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">ห้องประชุม</label>
                    </div>
                    <div class="field-body">
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="roomname" required>
                                        <option value="">เลือกหัวข้อห้องประชุม</option>
                                        <?php
                                        require "../DB/connect.php";
                                        $Squery = "SELECT * FROM room";
                                        if ($result = mysqli_query($con, $Squery)) {
                                            while ($room = mysqli_fetch_array($result)) {
                                        ?> <option value="<?php echo $room['roomname']; ?>"><?php echo $room['roomname']; ?></option>
                                        <?php }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="control">
                               <!--  <button type="submit" class="button is-primary">Choose</button> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">เลือกวันในการประชุม</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <label class="checkbox">
                                เลือกวันเริ่ม
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="date" id="startdate" name="event_startdate" min="<?php echo $today; ?>" max="2050-12-31" onchange="respondtodate()" required>
                            </p>

                        </div>
                        <div class="field">
                            <label class="checkbox">
                                เลือกวันสิ้นสุด
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="date" id="enddate" name="event_enddate" max="2050-12-31" required>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">เลือกเวลาในการประชุม</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <label class="checkbox">
                                เลือกเวลาเริ่ม
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="time" id="starttime" min="<?php echo $starttime; ?>" max="<?php echo $endtime; ?>" onchange="respondtotime()" name="event_starttime" required>
                            </p>

                        </div>
                        <div class="field">
                            <label class="checkbox">
                                เลือกเวลาสิ้นสุด
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="time" max="<?php echo $endtime; ?>" id="endtime" name="event_endtime" required>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">จำนวนผู้เข้าร่วมการประชุม</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="people" type="number" placeholder="กรอกจำนวนผู้เข้าประชุม" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">รายละเอียดการประชุม</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea" name="desc" placeholder="กรอกรายละเอียด"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">ชื่อผู้จอง</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <input class="input" name="reg" type="text" placeholder="กรอกชื่อ" required>
                            </p>
                        </div>
                    </div>
                </div> -->

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">อุปกรณ์งานโสตฯ</label>
                    </div>
                    <div class="field-body">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="tool" value="yes" required>
                                ใช้งาน ตามที่มีในห้อง
                            </label>
                            <label class="radio">
                                <input type="radio" name="tool" value="no">
                                ไม่ใช้งาน
                            </label>
                            <!-- <a href="">ดูรายละเอียดอุปกรณ์ในห้อง</a> -->
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">อุปกรณ์ชุดกาแฟ</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="coffeebigcup" id="coffeebigcup" onchange="toggledisable('Bcup')">
                                ชุดกาแฟ ตรา ศ.รพ.มพ. (ถาดรองแก้วใหญ่)
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="Bcup" id="Bcup" placeholder="กรอกจำนวนถาดรองแก้วใหญ่" min="0" oninput="this.value = Math.round(this.value);" value="" disabled>
                            </p>

                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="coffeesmallcup" id="coffeesmallcup" onchange="toggledisable('Scup')">
                                ชุดกาแฟ ตรา ศ.รพ.มพ. (ถาดรองแก้วเล็ก)
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="Scup" id="Scup" placeholder="กรอกจำนวนถาดรองแก้วเล็ก" min="0" oninput="this.value = Math.round(this.value);" value="" disabled>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">อุปกรณ์แก้วน้ำดื่ม</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="islongcup" id="islongcup" onchange="toggledisable('longcup')">
                                แก้วก้านยาว
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="longcup" id="longcup" placeholder="กรอกจำนวนแก้วก้านยาว" min="0" oninput="this.value = Math.round(this.value);" value="" disabled>
                            </p>

                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isdrinkcup" onchange="toggledisable('drinkcup')">
                                แก้วน้ำดื่ม
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="drinkcup" id="drinkcup" placeholder="กรอกจำนวนแก้วน้ำดื่ม" min="0" oninput="this.value = Math.round(this.value);" value="" disabled>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="issoftdrink" onchange="toggledisable('softdrink')">
                                แก้ว soft drink
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="softdrink" id="softdrink" placeholder="กรอกจำนวนแก้ว soft drink" min="0" oninput="this.value = Math.round(this.value);" value="" disabled>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isothercup" onchange="toggledisable('othercup')">
                                อื่นๆ
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="text" name="othercup" id="othercup" placeholder="อื่นๆ..." value="" disabled>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">อุปกรณ์อื่นๆ</label>
                    </div>
                    <div class="field-body">

                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="ishotbot" onchange="toggledisable('hotbot')">
                                กระบอกน้ำร้อน
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="hotbot" id="hotbot" placeholder="จำนวนกระบอกน้ำร้อน" min="0" oninput="this.value = Math.round(this.value);" value="" disabled>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="istray" onchange="toggledisable('tray')">
                                ถาด
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="tray" id="tray" placeholder="จำนวนถาด" value="" min="0" oninput="this.value = Math.round(this.value);" disabled>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isdishcup" onchange="toggledisable('dishcup')">
                                จานรองแก้ว
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="dishcup" id="dishcup" placeholder="จำนวนจานรองแก้ว" value="" min="0" oninput="this.value = Math.round(this.value);" disabled>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isjug" onchange="toggledisable('jug')">
                                เหยือกน้ำ
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="jug" id="jug" placeholder="จำนวนเหยือกน้ำ" value="" min="0" oninput="this.value = Math.round(this.value);" disabled>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isboxcup" onchange="toggledisable('boxcup')">
                                ลังใส่แก้ว
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="boxcup" id="boxcup" placeholder="จำนวนลังใส่แก้ว" value="" min="0" oninput="this.value = Math.round(this.value);" disabled>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="istea" onchange="toggledisable('tea')">
                                กาใส่ชา
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="tea" id="tea" placeholder="จำนวนกาใส่ชา" value="" min="0" oninput="this.value = Math.round(this.value);" disabled>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isboiler" onchange="toggledisable('boiler')">
                                หม้อต้มน้ำร้อน
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="boiler" id="boiler" placeholder="จำนวนหม้อต้มน้ำร้อน" value="" min="0" oninput="this.value = Math.round(this.value);" disabled>
                            </p>
                        </div>

                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isbasket" onchange="toggledisable('basket')">
                                ตะกร้า
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="basket" id="basket" placeholder="จำนวนตระกร้า" value="" min="0" oninput="this.value = Math.round(this.value);" disabled>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"></label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isothertool" onchange="toggledisable('other')">
                                อื่นๆ
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="text" name="other" id="other" placeholder="อื่นๆ..." value="" min="0" oninput="this.value = Math.round(this.value);" disabled>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- stat -->
                        <input type="hidden" value="2" name="statid">
                        <!-- Username -->
                        <input type="hidden" name="Username" value="<?php echo $_SESSION['Username']; ?>">
                        <!-- Left empty for spacing -->
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <button class="button is-primary" name="btn_add" type="submit" value="1">
                                    จองห้อง
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <!-- <div class="wrap-form">
        <form action="" method="post" accept-charset="utf-8">
            <div class="form-group row">
                <label for="event_title" class="col-sm-2 col-form-label text-right">หัวข้อกิจกรรม</label>
                <div class="col-12 col-sm-8">
                    <input type="text" class="form-control" name="event_title" autocomplete="off" value="" required>
                    <div class="invalid-feedback">
                        กรุณากรอก หัวข้อกิจกรรม
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="event_startdate" class="col-sm-2 col-form-label text-right">วันที่เริ่มต้น</label>
                <div class="col-12 col-sm-8">
                    <div class="input-group date" id="event_startdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="event_startdate" data-target="#event_startdate" autocomplete="off" value="" required>
                        <div class="input-group-append" data-target="#event_startdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอก วันที่เริ่มต้น
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="event_enddate" class="col-sm-2 col-form-label text-right">วันที่สิ้นสุด</label>
                <div class="col-12 col-sm-8">
                    <div class="input-group date" id="event_enddate" data-target-input="nearest">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-times-circle"></i></div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input" name="event_enddate" data-target="#event_enddate" autocomplete="off" value="">
                        <div class="input-group-append" data-target="#event_enddate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอก วันที่สิ้นสุด
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="event_starttime" class="col-sm-2 col-form-label text-right">เวลาเริ่มต้น</label>
                <div class="col-12 col-sm-8">
                    <div class="input-group date" id="event_starttime" data-target-input="nearest">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-times-circle"></i></div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input" name="event_starttime" data-target="#event_starttime" autocomplete="off" value="">
                        <div class="input-group-append" data-target="#event_starttime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอก เวลาเริ่มต้น
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="event_endtime" class="col-sm-2 col-form-label text-right">เวลาสิ้นสุด</label>
                <div class="col-12 col-sm-8">
                    <div class="input-group date" id="event_endtime" data-target-input="nearest">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-times-circle"></i></div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input" name="event_endtime" data-target="#event_endtime" autocomplete="off" value="">
                        <div class="input-group-append" data-target="#event_endtime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอก เวลาสิ้นสุด
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="event_endtime" class="col-2 col-form-label text-right">ทำซ้ำวันทั้งเดือน</label>
                <div class="col-12 col-sm-10 pt-2">
                    <?php
                    $dayTH = array('อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.');
                    ?>
                    <div class="input-group">
                        <?php foreach ($dayTH as $k => $day_value) { ?>
                            <div class="form-check ml-3" style="width:50px;">
                                <input class="custom-control-input repeatday_chk" type="checkbox" name="event_repeatday_chk" id="event_repeatday_chk<?= $k ?>" value="<?= $k ?>">
                                <label class="custom-control-label" for="event_repeatday_chk<?= $k ?>"><?= $day_value ?></label>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="event_repeatday" id="event_repeatday" value="" />
                    </div>
                    <br>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-10 offset-2 pl-5">
                    <input class="custom-control-input" type="checkbox" name="event_allday" id="event_allday" value="1">
                    <label class="custom-control-label" for="event_allday">
                        คลิกเลือกถ้าเป็นกิจกรรมทั้งวัน</label>
                    <br>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 offset-sm-2 text-right pt-3">
                    <button type="submit" name="btn_add" value="1" class="btn btn-primary btn-block">เพิ่มข้อมูล</button>
                </div>
            </div>
        </form>
    </div> -->


    <script type="text/javascript">
        // $(function() {
        //     // เมื่อเฃือกวันทำซ้ำ วนลูป สร้างชุดข้อมูล
        //     $(document.body).on("change", ".repeatday_chk", function() {
        //         $("#event_repeatday").val("");
        //         var repeatday_chk = [];
        //         $(".repeatday_chk:checked").each(function(k, ele) {
        //             repeatday_chk.push($(ele).val());
        //         });
        //         $("#event_repeatday").val(repeatday_chk.join(",")); // จะได้ค่าเปน เช่น 1,3,4
        //     });
        //     $('#event_startdate,#event_enddate').datetimepicker({
        //         format: 'YYYY-MM-DD'
        //     });
        //     $('#event_starttime,#event_endtime').datetimepicker({
        //         format: 'HH:mm'
        //     });
        //     $(".input-group-prepend").find("div").css("cursor", "pointer").click(function() {
        //         $(this).parents(".input-group").find(":text").val("");
        //     });
        // });

        // Initialize all input of type date ของ bulma
        var calendars = bulmaCalendar.attach('[type="date"]', {
            startDate: new Date('10/24/2019')
        });

        // Loop on each calendar initialized
        for (var i = 0; i < calendars.length; i++) {
            // Add listener to date:selected event
            calendars[i].on('select', date => {
                console.log(date);
            });
        }

        // To access to bulmaCalendar instance of an element
        var element = document.querySelector('#my-element');
        if (element) {
            // bulmaCalendar instance is available as element.bulmaCalendar
            element.bulmaCalendar.on('select', function(datepicker) {
                console.log(datepicker.data.value());
            });
        }
    </script>
    <script>
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById('enddate').setAttribute("min", today);
        console.log(today);

        function respondtodate() {
            if (document.getElementById('enddate').value < document.getElementById('startdate').value) {
                document.getElementById('enddate').value = document.getElementById('startdate').value;
            }
            var da = new Date();
            da = document.getElementById('startdate').value;
            document.getElementById('enddate').setAttribute("min", da);
        }


        function respondtotime() {
            if (document.getElementById('endtime').value < document.getElementById('starttime').value) {
                document.getElementById('endtime').value = document.getElementById('starttime').value;
            }
            var ta = new Date();
            ta = document.getElementById('starttime').value;
            console.log(ta);
            document.getElementById('endtime').setAttribute("min", ta);
        }

        function toggledisable(target) {
            if (document.getElementById(target).hasAttribute("disabled")) {
                document.getElementById(target).removeAttribute("disabled");
                console.log("i did it")
            } else {
                document.getElementById(target).setAttribute("disabled", "true")
                console.log("nani")
            }

        }
    </script>



</body>

</html>