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
    $bgcolor = '0';
    $sqlq = "Select * from room where roomname = '$roomname'";
    if ($result = mysqli_query($con, $sqlq)) {
        while ($ok = mysqli_fetch_array($result)) {
            $bgcolor = $ok['bgcolor'] ;
            $roomid = $ok['roomid'];
        }
    }
    $max = 'select max(event_id) from cars_event';
    $eventid = '0';
    if ($resultmax = mysqli_query($con, $max)) {
        while ($maxi = mysqli_fetch_array($resultmax)) {
            $eventid=$maxi['max(event_id)']+1;
        }
    }
    $sql = "
    INSERT INTO tbl_event SET
    event_id = '". $eventid ."',
    cars_id = '". $cars_id ."',
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
    statid='" . $stat . "',
    Username='" . $Username . "',
    other='" . $other . "'
    ";    
    $sqla = "Select * from tbl_event where (event_startdate Between '$p_event_startdate' and '$p_event_enddate') and (event_enddate Between '$p_event_startdate' and '$p_event_enddate') and (event_starttime Between '$p_event_starttime' and '$p_event_endtime')and (event_endtime Between '$p_event_starttime' and '$p_event_endtime') and (statid ='2' or statid = '1') ";
    $result2 = mysqli_query($con, $sqla);
    /* echo $sqla; */
    
    if ( $rowcount=mysqli_num_rows($result2) == 0 ){
        if ($mysqli->query($sql)){
            echo '<script>alert("New data inserted")
            window.location.href ="../app/form_calendar.php"</script>';
            }
    }else{        
        $z = 0; 
        while ($data = mysqli_fetch_array($result2)) {
            $id[$z] = $data['roomid'];
            $stime[$z] = $data['event_starttime'];
            $etime[$z] = $data['event_endtime'];
                
            /* echo $id[$z] . "<br>";
            echo $stime[$z] . "<br>";
            echo $etime[$z] . "<br>"; */
                $z = $z +1;
        }
        if (in_array($roomid,$id)){
            echo '<script>alert("วันเวลาที่เลือกไม่สามารถจองได้เนื่องจากมีผู้จองก่อนแล้ว (case1)")
            window.location.href ="../app/form_calendar.php"</script>';
        }else{
            if ( $hasDuplicates = count($id) > count(array_unique($id)) )
            {
                echo '<script>alert("วันเวลาที่เลือกไม่สามารถจองได้เนื่องจากมีผู้จองก่อนแล้ว (case2)")
                window.location.href ="../app/form_calendar.php"</script>';
            }
            else{
                if ($mysqli->query($sql)){
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
    include '../components/nav.php';
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
                                <input class="input" name="name" type="text" placeholder="กรอกชื่อ" required>
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
                                <input class="input" name="people" type="text" placeholder="กรอกสังกัด" required>
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
                                <textarea class="textarea" name="desc" placeholder="กรอกรายละเอียด"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">รถยนต์</label>
                    </div>
                    <div class="field-body">
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="roomname" required>
                                        <option value="">เลือกรถยนต์</option>
                                        <?php
                                    require "../DB/connect.php";
                                    $Squery = "SELECT * FROM car";
                                    if ($result = mysqli_query($con, $Squery)) {
                                        while ($car = mysqli_fetch_array($result)) {
?>                                            <option value="<?php echo $car['car_type'] .' '.$car['car_name']; ?>"><?php echo $car['car_type'] .' '. $car['car_name']; ?></option>
<?php }}
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

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">เลือกวัน</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <label class="checkbox">
                                เลือกวันเริ่ม
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="date" id="startdate" name="event_startdate" min="<?php echo $today;?>" max="2050-12-31" onchange="respondtodate()" required>
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
                        <label class="label">ให้รถยนต์ไปรับที่</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="people" type="text" placeholder="กรอกสถานที่" required>
                            </div>
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
                                    จองรถยนต์
                                </button>
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
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;
document.getElementById('enddate').setAttribute("min", today);
console.log(today);

function respondtodate(){
    if (document.getElementById('enddate').value < document.getElementById('startdate').value){
        document.getElementById('enddate').value = document.getElementById('startdate').value;
    }
    var da = new Date();
    da = document.getElementById('startdate').value;
    document.getElementById('enddate').setAttribute("min", da);
}


function respondtotime(){
    if (document.getElementById('endtime').value < document.getElementById('starttime').value){
        document.getElementById('endtime').value = document.getElementById('starttime').value;
    }
    var ta = new Date();
    ta = document.getElementById('starttime').value;
    console.log (ta);
    document.getElementById('endtime').setAttribute("min", ta);
}

function toggledisable(target){
    if (document.getElementById(target).hasAttribute("disabled")){
        document.getElementById(target).removeAttribute("disabled");
        console.log("i did it")
    }
    else {
        document.getElementById(target).setAttribute("disabled","true")
        console.log("nani")
    }
    
}


</script>

</body>

</html>