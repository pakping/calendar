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
    $event_id = '0';
    $regname = $_POST['regname'];
    $agency = $_POST['agency'];
    $description = $_POST['desc'];
    $p_event_title = (isset($_POST['event_title'])) ? $_POST['event_title'] : "";
    $peoplenum =  $_POST['people'];

    $p_event_startdate = (isset($_POST['event_startdate'])) ? $_POST['event_startdate'] : "0000-00-00";
    $p_event_enddate = (isset($_POST['event_enddate'])) ? $_POST['event_enddate'] : "0000-00-00";
    $p_event_starttime = (isset($_POST['event_starttime'])) ? $_POST['event_starttime'] : "00:00:00";
    $location = $_POST['location'];
    $max = 'select max(event_id) from cars_event';
    $eventid = '0';
    if ($resultmax = mysqli_query($con, $max)) {
        while ($maxi = mysqli_fetch_array($resultmax)) {
            $eventid = $maxi['max(event_id)'] + 1;
        }
    }
    $cars_id = array();
    if (isset($_POST['car1'])){
        array_push($cars_id,$_POST['car1']);
    }
    if (isset($_POST['car2'])){
        array_push($cars_id,$_POST['car2']);
    }
    if (isset($_POST['car3'])){
        array_push($cars_id,$_POST['car3']);
    }
    if (isset($_POST['car4'])){
        array_push($cars_id,$_POST['car4']);
    }
    $i=count($cars_id);
    $sqla = "Select * from cars_event where (event_startdate Between '$p_event_startdate' and '$p_event_enddate') and (event_enddate Between '$p_event_startdate' and '$p_event_enddate')";
    $result2 = mysqli_query($con, $sqla);
    while ($i!=0){
        $cars = end($cars_id);
        
        /* bgcolor */
        $sqlq = "Select * from cars where cars_id = '$cars'";
        if ($result = mysqli_query($con, $sqlq)) {
            while ($ok = mysqli_fetch_array($result)) {
                $bgcolor = $ok['bgcolor'] ;
                $carname = $ok['cars_name'] ;
            }
        }
        /* finish bgcolor */
        $sql = "
        INSERT INTO cars_event SET
        event_id = '" . $eventid . "',
        cars_id = '" . $cars . "',
        event_title='" . $p_event_title . "',
        event_startdate='" . $p_event_startdate . "',
        event_enddate='" . $p_event_enddate . "',
        event_starttime='" . $p_event_starttime . "',
        event_bgcolor='" . $bgcolor . "',
        people='" . $peoplenum . "',
        event_detail='" . $description . "',
        regname = '" . $regname ."',
        agency = '" . $agency ."',
        location = '". $location ."'
        ";
        echo '<script>console.log("i did it")</script>';
        if ( $rowcount=mysqli_num_rows($result2) == 0 ){
            if ($mysqli->query($sql)){
                echo '<script>alert("New data inserted")
                window.location.href ="../app/form_calendar.php"</script>';
                }
        }else{        
            $z = 0; 
            while ($data = mysqli_fetch_array($result2)) {
                $id[$z] = $data['cars_id'];
                $z = $z +1;
            }
            if (in_array($cars,$id)){
                echo '<script>alert("รถทะเบียน '. $carname .' ไม่สามารถจองได้เนื่องจากมีผู้จองก่อนแล้ว (case1)")
                </script>';
            }else{
                if ( $hasDuplicates = count($id) > count(array_unique($id)) )
                {
                    echo '<script>alert("รถทะเบียน '. $carname .'ไม่สามารถจองได้เนื่องจากมีผู้จองก่อนแล้ว (case2)")
                    </script>';
                }
                else{
                    if ($mysqli->query($sql)){
                        echo '<script>alert("New data inserted!!")
                        </script>';
                    }
                }
            }

        }
        array_pop($cars_id);
        $i = $i - 1 ;
    }
    /* $sqla = "Select * from cars_event";
    echo $sqla;
    $result2 = mysqli_query($con, $sqla); */
    

    /* if ($rowcount = mysqli_num_rows($result2) == 0) {
        if ($mysqli->query($sql)) {
            echo '<script>alert("New data inserted")
            window.location.href ="../app/form_car.php"</script>';
        }
    } else {
        $z = 0;
        while ($data = mysqli_fetch_array($result2)) {
            $id[$z] = $data['event_id'];
            $stime[$z] = $data['event_starttime'];


            echo $id[$z] . "<br>";
            echo $stime[$z] . "<br>";
            echo $etime[$z] . "<br>";
            $z = $z + 1;
        }
        if (in_array($event_id, $id)) {
            echo '<script>alert("วันเวลาที่เลือกไม่สามารถจองได้เนื่องจากมีผู้จองก่อนแล้ว (case1)")
            window.location.href ="../app/form_car.php"</script>';
        } else {
            if ($hasDuplicates = count($id) > count(array_unique($id))) {
                echo '<script>alert("วันเวลาที่เลือกไม่สามารถจองได้เนื่องจากมีผู้จองก่อนแล้ว (case2)")
                window.location.href ="../app/form_car.php"</script>';
            } else {
                if ($mysqli->query($sql)) {
                    echo '<script>alert("New data inserted!!")
                    window.location.href ="../app/calendar.php"</script>';
                }
            }
        }
    } */
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
            <div class="container box">
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
                                <input class="input" name="regname" type="text" placeholder="กรอกชื่อ" required>
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
                                <input class="input" name="agency" type="text" placeholder="กรอกสังกัด" required>
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
                        <label class="label">เพื่อ</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="event_title" type="text" placeholder="กรอกจุดประสงค์" required>
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
                                <input class="input" name="people" type="number" placeholder="กรอกจำนวนคน" required>
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





               <!--  <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">จำนวนรถยนต์</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="select is-fullwidth">
                                <select name="numcar" required onchange="toggledisable()">
                                    <option value="">เลือกจำนวนรถยนต์ที่ใช้</option> -->
                                    <?php
                                   /*  require "../DB/connect.php";
                                    $sqlcarr = "SELECT * FROM cars ORDER BY cars_id";
                                    if ($resultcar = mysqli_query($con, $sqlcarr)) {
                                        $rowcount = mysqli_num_rows($resultcar);
                                        $b = 1;
                                        while ($b <= $rowcount) { */
                                    ?>
                                          <!--   <option  value="<?php echo $b; ?>"><?php echo $b; ?></option> -->
                                    <?php
                                   /*          $b += 1;
                                        }
                                    } */
                                    ?>
                                <!-- </select>
                            </div>
                            

                        </div>
                    </div>
                </div> -->

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">เลือกรถ</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="is-fullwidth">
                                <div class="field">
                                    
                                        <?php $qqq = "SELECT * FROM cars";
                                        if ($carsss = mysqli_query($con, $qqq)) {
                                            $z = 1;
                                            while ($gotcar = mysqli_fetch_array($carsss)) { ?>
                                            <label class="checkbox">
                                                <input type="checkbox"  name="car<?php echo $z; ?>" id='<?php echo $z;?>' value="<?php echo $gotcar['cars_id'] ?>"> <?php echo $gotcar['cars_name']; ?>
                                            </label>    
                                        <?php $z = $z + 1;
                                            }
                                        }  ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">เลือกเวลาในการออกเดินทาง</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <label class="checkbox">
                                เลือกเวลาเริ่ม
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="time" id="starttime" min="<?php echo $starttime; ?>" max="<?php echo $endtime; ?>"  name="event_starttime" required>
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
                                <input class="input" name="location" type="text" placeholder="กรอกสถานที่" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label">
                        
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

        function toggledisable() {
            document.getElementById(1).removeAttribute("disabled");
            document.getElementById(2).removeAttribute("disabled");
            document.getElementById(3).removeAttribute("disabled");
            document.getElementById(4).removeAttribute("disabled");
            console.log('i did it');
        }
    
    </script>

</body>

</html>