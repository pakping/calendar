<?php
date_default_timezone_set("Asia/Bangkok");
// โค้ดไฟล์ dbconnect.php ดูได้ที่ http://niik.in/que_2398_5642
require_once("../DB/dbconnect.php");
$content = 'everyone';
include '../auth/Sessionpersist.php';
if (isset($_POST['eventid'])) {
    echo ($_POST['eventid']);
    $eventid = $_POST['eventid'];
    $_SESSION['eventid'] = $eventid;
} else if (isset($_SESSION['eventid'])) {
    $eventid = $_SESSION['eventid'];
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
    if ($_SESSION['type'] == 'user') {
        include '../components/nav.php';
    } elseif ($_SESSION['type'] == 'admin') {
        include '../components/navbaradmin.php';
    } {
    }

    ?>
    <?php

    require '../DB/connect.php';
    $result = mysqli_query($con, "SELECT * FROM cars_event left join cars ON cars_event.cars_id=cars.cars_id left join stat ON cars_event.statid=stat.statid Where event_id = '$eventid'");

    if ($result) {
        $row = mysqli_fetch_array($result);
    }
    ?>
    <form action="" method="post" accept-charset="utf-8">
        <section class="section">
            <div class="container">
                <div class="notification is-primary">
                    <strong>ขอใช้รถยนต์</strong>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">ชื่อผู้จอง</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="regname" type="text" placeholder="กรอกชื่อ" value="<?php echo $row['regname']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">สังกัด</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="agency" type="text" placeholder="กรอกสังกัด" value="<?php echo $row['agency']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">มีความประสงค์ขออนุญาตใช้รถไป</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea" name="desc" placeholder="กรอกรายละเอียด"><?php echo $row['event_detail']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">เพื่อ</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="event_title" type="text" placeholder="กรอกจุดประสงค์" value="<?php echo $row['event_title']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">จำนวนคน</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="people" type="number" placeholder="กรอกจำนวนคน" value="<?php echo $row['people']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">วัน</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <label class="checkbox">
                                วันเริ่ม
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="date" id="startdate" name="event_startdate" value="<?php echo $row['event_startdate']; ?>" readonly>
                            </p>

                        </div>
                        <div class="field">
                            <label class="checkbox">
                                วันสิ้นสุด
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="date" id="enddate" name="event_enddate" value="<?php echo $row['event_enddate']; ?>" readonly>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">รายการรถยนต์</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="is-fullwidth">
                                <div class="field">

                                    <?php $qqq = "SELECT * FROM cars_event left join cars ON cars_event.cars_id=cars.cars_id Where event_id = '$eventid'";
                                    if ($carsss = mysqli_query($con, $qqq)) {
                                        $allcar = '';
                                        while ($gocar = mysqli_fetch_array($carsss)) {
                                            $gotcar = $gocar['cars_name'];
                                            $allcar = $allcar .  $gotcar . " , ";
                                        }
                                    ?>

                                        <label>
                                            <input class="input" type="text" value="<?php echo $allcar; ?>" readonly>
                                        </label>
                                    <?php }  ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">เวลาในการออกเดินทาง</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <label class="checkbox">
                                เวลาเริ่ม
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="text" id="starttime" value="<?php echo $row['event_starttime'] ?>" readonly>
                            </p>

                        </div>

                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">ให้รถยนต์ไปรับที่</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="location" type="text" value="<?php echo $row['location'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <script type="text/javascript">
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
    </script>

</body>

</html>