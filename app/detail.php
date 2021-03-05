<?php
$content = 'everyone';
include '../auth/Sessionpersist.php';
if (isset($_POST['eventid'])) {
    echo ($_POST['eventid']);
    $eventid = $_POST['eventid'];
    $_SESSION['eventid']=$eventid;
}else if(isset($_SESSION['eventid'])){
    $eventid = $_SESSION['eventid'];
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
    <link rel="stylesheet" type="text/css" href="../css/color.css">

    <title>UP</title>
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
    <!-- Navigation -->
    <?php
    require '../DB/connect.php';
    $result = mysqli_query($con, "SELECT * FROM tbl_event left join room ON tbl_event.roomid=room.roomid left join stat ON tbl_event.statid=stat.statid left join user ON tbl_event.Username=user.Username Where event_id = '$eventid'");

    if ($result) {
        $row = mysqli_fetch_array($result);
    }
    ?>
    
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

                        <p class="control">
                            <input class="input is-static" type="text" value="<?php echo $row['event_title']; ?>" readonly>
                        </p>
                        <p class="control">
                            <input class="input is-static" type="text" value="" readonly>
                        </p>

                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">ห้องประชุม</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input is-static" type="text" value="<?php echo $row['roomname']; ?>" readonly>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">วันในการประชุม</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <label class="checkbox">
                            วันเริ่ม
                        </label>
                        <p class="control is-expanded ">
                            <input class="input is-static" type="text" id="startdate" name="event_startdate" min="<?php echo $today; ?>" max="2050-12-31" onchange="respondtodate()" value="<?php echo $row['event_startdate']; ?>" readonly>
                        </p>

                    </div>
                    <div class="field">
                        <label class="checkbox">
                            วันสิ้นสุด
                        </label>
                        <p class="control is-expanded ">
                            <input class="input is-static" type="text" id="enddate" name="event_enddate" max="2050-12-31" value="<?php echo $row['event_enddate'] ?>" readonly>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">เวลาในการประชุม</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <label class="checkbox">
                            เวลาเริ่ม
                        </label>
                        <p class="control is-expanded ">
                            <input class="input is-static" type="text" name="event_starttime" min="<?php echo $today; ?>" max="2050-12-31" value="<?php echo $row['event_starttime'] ?>" readonly>
                        </p>

                    </div>
                    <div class="field">
                        <label class="checkbox">
                            เวลาสิ้นสุด
                        </label>
                        <p class="control is-expanded ">
                            <input class="input is-static" type="text" name="event_starttime" min="<?php echo $today; ?>" max="2050-12-31" value="<?php echo $row['event_endtime'] ?>" readonly>
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
                            <input class="input is-static" name="people" type="text" placeholder="กรอกจำนวนผู้เข้าประชุม" value="<?php echo $row['people'] ?>" readonly>
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
                            <textarea class="textarea is-static" name="desc" placeholder="กรอกรายละเอียด" value="" readonly><?php echo $row['event_detail'] ?></textarea>
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
                        <input class="input is-static" name="reg" type="text" placeholder="กรอกชื่อ" value="<?php echo $row['fname'] . "   " . $row['lname'] ?>" readonly>

                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">อุปกรณ์งานโสตฯ</label>
                </div>
                <div class="field-body">
                    <div class="control">
                        <?php if ($row['tool'] != 0) { ?>
                            <p class="control">
                                <input class="input is-static" type="text" value="ใช้งาน ตามที่มีในห้อง" readonly>
                            </p>
                        <?php } else { ?>
                            <p class="control">
                                <input class="input is-static" type="text" value="ไม่ใช้งาน" readonly>
                            </p>

                        <?php } ?>
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
                            <input type="checkbox" name="coffeesmallcup" id="coffeesmallcup" onchange="toggledisable('Scup')" <?php if ($row['Scup'] != 0) {
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
                            <button class="button is-danger" type="button" onclick="back()">กลับ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript">
        function back() {
            user = '<?php $_SESSION['type']; ?>';
            if ( user == "user" ) {
                window.location.href = "../app/statusroom.php"
            } else {
                window.location.href = "../admin/adminstatusroom.php"
            }

        }
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