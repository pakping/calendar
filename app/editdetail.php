<?php
$content = 'user';
include '../auth/Sessionpersist.php';
if (isset($_POST['eventid'])) {
    echo ($_POST['eventid']);
    $eventid = $_POST['eventid'];
}
$today = date("Y-m-d");
?>

<!doctype html>
<html lang="en">

<head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <title>UP</title>
</head>

<body>
    <?php
    include '../components/nav.php';
    ?>
    <!-- Navigation -->
    <?php
    require '../DB/connect.php';
    $result = mysqli_query($con, "SELECT * FROM tbl_event left join room ON tbl_event.roomid=room.roomid left join stat ON tbl_event.statid=stat.statid Where event_id = '$eventid'");

    if ($result) {
        $row = mysqli_fetch_array($result);
    }
    ?>
    <form action="../function/update.php" method="post">
        <section class="section">
            <div class="container">
                <div class="notification is-primary">
                    <strong>รายละเอียดห้องการประชุม</strong>
                    <strong>ห้องประชุม</strong>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">หัวข้อกิจกรรม</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <input class="input" type="text" name="event_title" value="<?php echo $row['event_title']; ?>" placeholder="กรอกหัวข้อการประชุม">

                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">ห้องประชุม</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <div class="select is-fullwidth">
                                        <select name="roomname">
                                            <option value="<?php echo $row['roomname']; ?>"><?php echo $row['roomname']; ?></option>
                                            <?php
                                            require "../DB/connect.php";
                                            $room = $row['roomname'];
                                            $Squery = "SELECT * FROM room Where roomname != '$room'";
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
                                    <button type="submit" class="button is-primary">Choose</button>
                                </div>
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
                                <input class="input" type="date" id="startdate" name="event_startdate" min="<?php echo $today; ?>" max="2050-12-31" onchange="respondtodate()" value="<?php echo $row['event_startdate']; ?>">
                            </p>

                        </div>
                        <div class="field">
                            <label class="checkbox">
                                เลือกวันสิ้นสุด
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="date" id="enddate" name="event_enddate" max="2050-12-31" value="<?php echo $row['event_enddate'] ?>">
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
                                <input class="input" type="time" name="event_starttime" min="<?php echo $today; ?>" max="2050-12-31" value="<?php echo $row['event_starttime'] ?>">
                            </p>

                        </div>
                        <div class="field">
                            <label class="checkbox">
                                เลือกเวลาสิ้นสุด
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="time" name="event_starttime" min="<?php echo $today; ?>" max="2050-12-31" value="<?php echo $row['event_endtime'] ?>">
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
                                <input class="input" name="people" type="number" placeholder="กรอกจำนวนผู้เข้าประชุม" value="<?php echo $row['people'] ?>">
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
                                <textarea class="textarea" name="desc" placeholder="กรอกรายละเอียด" value=""><?php echo $row['description'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">ชื่อผู้จอง</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <input class="input" name="reg" type="text" placeholder="กรอกชื่อ" value="<?php echo $row['reguser'] ?>">

                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">อุปกรณ์งานโสตฯ</label>
                    </div>
                    <div class="field-body">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="tool" value="1" <?php if ($row['tool'] != 0) {
                                                                                echo 'checked';
                                                                            } ?>>
                                ใช้งาน ตามที่มีในห้อง
                            </label>
                            <label class="radio">
                                <input type="radio" name="tool" value="0" <?php if ($row['tool'] == 0) {
                                                                                echo 'checked';
                                                                            } ?>>
                                ไม่ใช้งาน
                            </label>
                            <a href="">ดูรายละเอียดอุปกรณ์ในห้อง</a>
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
                                <input type="checkbox" name="coffeebigcup" id="coffeebigcup" onchange="toggledisable('Bcup')" <?php if ($row['Bcup'] != 0) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                ชุดกาแฟ ตรา ศ.รพ.มพ. (ถาดรองแก้วใหญ่)
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="Bcup" id="Bcup" placeholder="กรอกจำนวนถาดรองแก้วใหญ่" min="0" oninput="this.value = Math.round(this.value);" value="<?php echo $row['Bcup']; ?>" <?php if ($row['Bcup'] == 0) {
                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                    } ?>>
                            </p>

                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="coffeesmallcup" id="coffeesmallcup" onchange="toggledisable('Scup')"  <?php if ($row['Scup'] != 0) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                                ชุดกาแฟ ตรา ศ.รพ.มพ. (ถาดรองแก้วเล็ก)
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="Scup" id="Scup" placeholder="กรอกจำนวนถาดรองแก้วเล็ก" min="0" oninput="this.value = Math.round(this.value);" value="<?php echo $row['Scup']; ?>" <?php if ($row['Scup'] == 0) {
                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                    } ?>>
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
                                <input type="checkbox" name="islongcup" id="islongcup" onchange="toggledisable('longcup')" <?php if ($row['longcup'] != 0) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                แก้วก้านยาว
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="longcup" id="longcup" placeholder="กรอกจำนวนแก้วก้านยาว" value="<?php echo $row['longcup']; ?>" <?php if ($row['longcup'] == 0) {
                                                                                                                                                                                echo 'disabled';
                                                                                                                                                                            } ?>>
                            </p>

                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isdrinkcup" onchange="toggledisable('drinkcup')" <?php if ($row['drinkcup'] != 0) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                                แก้วน้ำดื่ม
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="drinkcup" id="drinkcup" placeholder="กรอกจำนวนแก้วน้ำดื่ม" value="<?php echo $row['drinkcup']; ?>" <?php if ($row['drinkcup'] == 0) {
                                                                                                                                                                                echo 'disabled';
                                                                                                                                                                            } ?>>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="issoftdrink" onchange="toggledisable('softdrink')" <?php if ($row['softdrink'] != 0) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                                แก้ว soft drink
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="softdrink" id="softdrink" placeholder="กรอกจำนวนแก้ว soft drink" min="0" oninput="this.value = Math.round(this.value);" value="<?php echo $row['softdrink']; ?>" <?php if ($row['softdrink'] == 0) {
                                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                                    } ?>>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isothercup" onchange="toggledisable('othercup')" <?php if ($row['othercup'] != 'none') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                                อื่นๆ
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="text" name="othercup" id="othercup" placeholder="อื่นๆ..." value="<?php echo $row['othercup']; ?>" <?php if ($row['othercup'] == 'none') {
                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                } ?>>
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
                                <input type="checkbox" name="ishotbot" onchange="toggledisable('hotbot')" <?php if ($row['hotbot'] != 0) {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                                กระบอกน้ำร้อน
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="hotbot" id="hotbot" placeholder="จำนวนกระบอกน้ำร้อน" min="0" oninput="this.value = Math.round(this.value);" value="<?php echo $row['hotbot']; ?>" <?php if ($row['hotbot'] == 0) {
                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                    } ?>>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="istray" onchange="toggledisable('tray')" <?php if ($row['tray'] != 0) {
                                                                                                            echo 'checked';
                                                                                                        } ?>>
                                ถาด
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="tray" id="tray" placeholder="จำนวนถาด" min="0" oninput="this.value = Math.round(this.value);" value="<?php echo $row['tray']; ?>" <?php if ($row['tray'] == 0) {
                                                                                                                                                        echo 'disabled';
                                                                                                                                                    } ?>>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isdishcup" onchange="toggledisable('dishcup')" <?php if ($row['dishcup'] != 0) {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                                จานรองแก้ว
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="dishcup" id="dishcup" placeholder="จำนวนจานรองแก้ว" value="<?php echo $row['dishcup']; ?>" <?php if ($row['dishcup'] == 0) {
                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                    } ?>>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isjug" onchange="toggledisable('jug')" <?php if ($row['jug'] != 0) {
                                                                                                        echo 'checked';
                                                                                                    } ?>>
                                เหยือกน้ำ
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="jug" id="jug" placeholder="จำนวนเหยือกน้ำ" min="0" oninput="this.value = Math.round(this.value);" value="<?php echo $row['jug']; ?>" <?php if ($row['jug'] == 0) {
                                                                                                                                                            echo 'disabled';
                                                                                                                                                        } ?>>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isboxcup" onchange="toggledisable('boxcup')" <?php if ($row['boxcup'] != 0) {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                                ลังใส่แก้ว
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="boxcup" id="boxcup" placeholder="จำนวนลังใส่แก้ว" value="<?php echo $row['boxcup']; ?>" <?php if ($row['boxcup'] == 0) {
                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                    } ?>>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="istea" onchange="toggledisable('tea')" <?php if ($row['tea'] != 0) {
                                                                                                        echo 'checked';
                                                                                                    } ?>>
                                กาใส่ชา
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="tea" id="tea" placeholder="จำนวนกาใส่ชา" min="0" oninput="this.value = Math.round(this.value);" value="<?php echo $row['tea']; ?>" <?php if ($row['tea'] == 0) {
                                                                                                                                                            echo 'disabled';
                                                                                                                                                        } ?>>
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isboiler" onchange="toggledisable('boiler')" <?php if ($row['boiler'] != 0) {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                                หม้อต้มน้ำร้อน
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="boiler" id="boiler" placeholder="จำนวนหม้อต้มน้ำร้อน" value="<?php echo $row['boiler']; ?>" <?php if ($row['boiler'] == 0) {
                                                                                                                                                                            echo 'disabled';
                                                                                                                                                                        } ?>>
                            </p>
                        </div>
  
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isbasket" onchange="toggledisable('basket')" <?php if ($row['basket'] != 0) {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                                ตะกร้า
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="basket" id="basket" placeholder="จำนวนตระกร้า" min="0" oninput="this.value = Math.round(this.value);" value="<?php echo $row['basket']; ?>" <?php if ($row['basket'] == 0) {
                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                } ?>>
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
                                <input type="checkbox" name="isothertool" onchange="toggledisable('other')" <?php if ($row['other'] != 'none') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                                อื่นๆ
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="text" name="other" id="other" placeholder="อื่นๆ..." value="<?php echo $row['other']; ?>" <?php if ($row['other'] == 'none') {
                                                                                                                                                            echo 'disabled';
                                                                                                                                                        } ?>>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- Left empty for spacing -->
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="buttons">
                                <button class="button is-success" name="btn_add" type="submit">ตกลง</button>
                                <input type="hidden" name="eid" value="<?php echo $eventid; ?>">
                                <button class="button is-danger" onclick="back()">ยกเลิก</button>
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
                    <input type="text" class="form-control" name="event_title" autocomplete="off" value="" >
                    <div class="invalid-feedback">
                        กรุณากรอก หัวข้อกิจกรรม
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="event_startdate" class="col-sm-2 col-form-label text-right">วันที่เริ่มต้น</label>
                <div class="col-12 col-sm-8">
                    <div class="input-group date" id="event_startdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="event_startdate" data-target="#event_startdate" autocomplete="off" value="" >
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
        function back() {
            window.location.href = "../app/statusroom.php"
        }
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
    </script>
    <!-- checkboc enable disible -->
    <script>
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
    <?php
    include '../components/footer.php';
    ?>

</body>

</html>