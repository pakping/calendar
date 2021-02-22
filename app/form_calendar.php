<?php
// โค้ดไฟล์ dbconnect.php ดูได้ที่ http://niik.in/que_2398_5642
require_once("dbconnect.php");
$content = 'everyone';
include '../auth/Sessionpersist.php';
$today = date("Y-m-d");
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
    $regname = $_POST['reg'];
    $tool = $_POST['tool'];
    if (isset($_POST['coffeesmallcup'])){
        $Scup = $_POST['Scup'];
    }else{
        $Scup = '0';
    }
    if (isset($_POST['coffeebigcup'])){
        $Bcup = $_POST['Bcup'];
    }else{
        $Bcup = '0';
    }
    if (isset($_POST['islongcup'])){
        $longcup = $_POST['longcup'];
    }else{
        $longcup = '0';
    }
    if (isset($_POST['isdrinkcup'])){
        $drinkcup = $_POST['drinkcup'];
    }else{
        $drinkcup = '0';
    }
    if (isset($_POST['issoftdrink'])){
        $softdrink = $_POST['softdrink'];
    }else{
        $softdrink = '0';
    }
    if (isset($_POST['isothercup'])){
        $othercup = $_POST['othercup'];
    }else{
        $othercup = 'none';
    }
    if (isset($_POST['ishotbot'])){
        $hotbot = $_POST['hotbot'];
    }else{
        $hotbot = '0';
    }
    if (isset($_POST['istray'])){
        $tray = $_POST['tray'];
    }else{
        $tray = '0';
    }
    if (isset($_POST['isdishcup'])){
        $dishcup = $_POST['dishcup'];
    }else{
        $dishcup = '0';
    }
    if (isset($_POST['isjug'])){
        $jug = $_POST['jug'];
    }else{
        $jug = '0';
    }
    if (isset($_POST['isboxcup'])){
        $boxcup = $_POST['boxcup'];
    }else{
        $boxcup = '0';
    }
    if (isset($_POST['istea'])){
        $tea = $_POST['tea'];
    }else{
        $tea = '0';
    }
    if (isset($_POST['isboiler'])){
        $boiler = $_POST['boiler'];
    }else{
        $boiler = '0';
    }
    if (isset($_POST['isbasket'])){
        $basket = $_POST['basket'];
    }else{
        $basket = '0';
    }
    if (isset($_POST['isothertool'])){
        $other = $_POST['other'];
    }else{
        $other = 'none';
    }

    $sql = "
    INSERT INTO tbl_event SET
    event_title='" . $p_event_title . "',
    event_startdate='" . $p_event_startdate . "',
    event_enddate='" . $p_event_enddate . "',
    event_starttime='" . $p_event_starttime . "',
    event_endtime='" . $p_event_endtime . "',
    event_repeatday='" . $p_event_repeatday . "',
    event_allday='" . $p_event_allday . "',
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
    other='" . $other . "',
    ";

    $mysqli->query($sql);
    echo '<script>alert("ssss")
        window.location.href ="../index.php"</script>';
    exit;
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
    <br>
    <br>
    <form action="" method="post">
        <section class="section">
            <div class="container">
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
                            </p>
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
                                    <select name="country" required>
                                        <option value="">เลือกหัวข้อห้องประชุม</option>
                                        <?php
                                    require "../DB/connect.php";
                                    $Squery = "SELECT * FROM room";
                                    if ($result = mysqli_query($con, $Squery)) {
                                        while ($room = mysqli_fetch_array($result)) {
?>                                            <option value="<?php echo $room['roomid']; ?>"><?php echo $room['roomname']; ?></option>
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
                        <label class="label">เลือกวันในการประชุม</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <label class="checkbox">
                                เลือกวันเริ่ม
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="date" name="event_startdate" min="<?php echo $today;?>" max="2050-12-31"  required>
                            </p>

                        </div>
                        <div class="field">
                            <label class="checkbox">
                                เลือกวันสิ้นสุด
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="date" name="event_enddate" min="<?php echo $today;?>" max="2050-12-31" required>
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
                                <input class="input" name="people" type="number" placeholder="กรอกจำนวนผู้เข้าประชุม">
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

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">ชื่อผู้จอง</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <input class="input" name="reg" type="text" placeholder="กรอกชื่อ" required>
                            </p>
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
                                <input type="radio" name="tool" value="yes">
                                ใช้งาน ตามที่มีในห้อง
                            </label>
                            <label class="radio">
                                <input type="radio" name="tool" value="no">
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
                                <input type="checkbox" name="coffeebigcup">
                                ชุดกาแฟ ตรา ศ.รพ.มพ. (ถาดรองแก้วใหญ่)
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="Bcup" placeholder="กรอกจำนวนถาดรองแก้วใหญ่" value="">
                            </p>

                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="coffeesmallcup"> 
                                ชุดกาแฟ ตรา ศ.รพ.มพ. (ถาดรองแก้วเล็ก)
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="Scup" placeholder="กรอกจำนวนถาดรองแก้วเล็ก" value="">
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
                                <input type="checkbox" name="islongcup">
                                แก้วก้านยาว
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="longcup" placeholder="กรอกจำนวนแก้วก้านยาว" value="">
                            </p>

                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isdrinkcup">
                                แก้วน้ำดื่ม
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="drinkcup" placeholder="กรอกจำนวนแก้วน้ำดื่ม" value="">
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="issoftdrink">
                                แก้ว soft drink
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="softdrink" placeholder="กรอกจำนวนแก้ว soft drink" value="">
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox" name="isothercup">
                                อื่นๆ
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="text" name="othercup" placeholder="อื่นๆ..." value="">
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
                                <input type="checkbox" name="ishotbot">
                                กระบอกน้ำร้อน
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="hotbot" placeholder="จำนวนกระบอกน้ำร้อน" value="">
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="istray">
                                ถาด
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="tray" placeholder="จำนวนถาด" value="">
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="isdishcup">
                                จานรองแก้ว
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="dishcup" placeholder="จำนวนจานรองแก้ว" value="">
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                            <input type="checkbox" name="isjug">
                                เหยือกน้ำ
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="jug" placeholder="จำนวนเหยือกน้ำ" value="">
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                            <input type="checkbox" name="isboxcup">
                                ลังใส่แก้ว
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="boxcup" placeholder="จำนวนลังใส่แก้ว" value="">
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                            <input type="checkbox" name="istea">
                                กาใส่ชา
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="tea" placeholder="จำนวนกาใส่ชา" value="">
                            </p>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                            <input type="checkbox" name="isboiler">
                                หม้อต้มน้ำร้อน
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="boiler" placeholder="จำนวนหม้อต้มน้ำร้อน" value="">
                            </p>
                        </div>
                        
                        <div class="field">
                            <label class="checkbox">
                            <input type="checkbox" name="isbasket">
                                ตะกร้า
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="number" name="basket" placeholder="จำนวนตระกร้า" value="">
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
                            <input type="checkbox" name="isothertool">
                                อื่นๆ
                            </label>
                            <p class="control is-expanded ">
                                <input class="input" type="text" name="other" placeholder="อื่นๆ..." value="">
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
                            <div class="control">
                                <button class="button is-primary" type="submit">
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


</body>

</html>