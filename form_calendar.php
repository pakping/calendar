<?php
// โค้ดไฟล์ dbconnect.php ดูได้ที่ http://niik.in/que_2398_5642
require_once("dbconnect.php");
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
    $sql = "
    INSERT INTO tbl_event SET
    event_title='" . $p_event_title . "',
    event_startdate='" . $p_event_startdate . "',
    event_enddate='" . $p_event_enddate . "',
    event_starttime='" . $p_event_starttime . "',
    event_endtime='" . $p_event_endtime . "',
    event_repeatday='" . $p_event_repeatday . "',
    event_allday='" . $p_event_allday . "'
    ";
    $mysqli->query($sql);
    header("Location:form_calendar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>

    <meta charset='utf-8' />

    <?php
    include 'bootstrap.php';
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
    include 'nav.php';
    ?>
    <br>
    <br>
    <div class="wrap-form">
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
    </div>


    <script type="text/javascript">
        $(function() {
            // เมื่อเฃือกวันทำซ้ำ วนลูป สร้างชุดข้อมูล
            $(document.body).on("change", ".repeatday_chk", function() {
                $("#event_repeatday").val("");
                var repeatday_chk = [];
                $(".repeatday_chk:checked").each(function(k, ele) {
                    repeatday_chk.push($(ele).val());
                });
                $("#event_repeatday").val(repeatday_chk.join(",")); // จะได้ค่าเปน เช่น 1,3,4
            });
            $('#event_startdate,#event_enddate').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#event_starttime,#event_endtime').datetimepicker({
                format: 'HH:mm'
            });
            $(".input-group-prepend").find("div").css("cursor", "pointer").click(function() {
                $(this).parents(".input-group").find(":text").val("");
            });
        });
    </script>


</body>

</html>