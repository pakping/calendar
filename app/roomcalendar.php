<?php
$fullcalendar_path = "fullcalendar-4.4.2/packages/";
$content = 'user';
include '../auth/Sessionpersist.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>room</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
  <link href='<?= $fullcalendar_path ?>/core/main.css' rel='stylesheet' />
  <link href='<?= $fullcalendar_path ?>/daygrid/main.css' rel='stylesheet' />

  <!--   ส่วนที่เพิ่มเข้ามาใหม่-->
  <link href='<?= $fullcalendar_path ?>/timegrid/main.css' rel='stylesheet' />
  <link href='<?= $fullcalendar_path ?>/list/main.css' rel='stylesheet' />

  <script src='<?= $fullcalendar_path ?>/core/main.js'></script>
  <script src='<?= $fullcalendar_path ?>/daygrid/main.js'></script>
  <!--   ส่วนที่เพิ่มเข้ามาใหม่-->
  <script src='<?= $fullcalendar_path ?>/core/locales/th.js'></script>
  <script src='<?= $fullcalendar_path ?>/timegrid/main.js'></script>
  <script src='<?= $fullcalendar_path ?>/interaction/main.js'></script>
  <script src='<?= $fullcalendar_path ?>/list/main.js'></script>


  <style type="text/css">
    #calendar {
      width: 100%;
      margin: auto;
    }
  </style>
</head>

<body>


  <?php
  include '../components/nav.php';
  ?>
  <!-- Navigation -->

  <!-- calendar -->



  <div class="container">
    <br>
    <p class="is-size-2	">ห้องประชุม...</p>
    <br>
    <div id='calendar'></div>
    <!-- Modal -->
    <div class="modal fade" id="calendarmodal" tabindex="-1" role="dialog">
      <!--กำหนด id ให้กับ modal-->
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="calendarmodal-title">Modal title</h5>
            <!--กำหนด id ให้ส่วนหัวข้อ-->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="calendarmodal-detail"> ก
            <!--ำหนด id ให้ส่วนรายละเอียด-->
            Modal detail
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    var calendar; // สร้างตัวแปรไว้ด้านนอก เพื่อให้สามารถอ้างอิงแบบ global ได้
    $(function() {
      // กำหนด element ที่จะแสดงปฏิทิน
      var calendarEl = $("#calendar")[0];

      // กำหนดการตั้งค่า
      calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'], // plugin ที่เราจะใช้งาน
        defaultView: 'dayGridMonth', // ค้าเริ่มร้นเมื่อโหลดแสดงปฏิทิน
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        events: { // เรียกใช้งาน event จาก json ไฟล์ ที่สร้างด้วย php
          url: 'events.php?gData=1',
          error: function() {

          }
        },
        eventLimit: true, // allow "more" link when too many events
        locale: 'th', // กำหนดให้แสดงภาษาไทย
        firstDay: 0, // กำหนดวันแรกในปฏิทินเป็นวันอาทิตย์ 0 เป็นวันจันทร์ 1
        showNonCurrentDates: false, // แสดงที่ของเดือนอื่นหรือไม่
        eventTimeFormat: { // รูปแบบการแสดงของเวลา เช่น '14:30' 
          hour: '2-digit',
          minute: '2-digit',
          meridiem: false /*  */
        }
      });

      // แสดงปฏิทิน 
      calendar.render();

    });
  </script>
  <script type="text/javascript">
    function viewdetail(id) {
      // ก่อนที่ modal จะแสดง
      $('#calendarmodal').on('show.bs.modal', function(e) {
        var event = calendar.getEventById(id) // ดึงข้อมูล ผ่าน api
        $("#calendarmodal-title").html(event.title);
        $("#calendarmodal-detail").html(event.extendedProps.detail); // ข้อมูลเพิ่มเติมจะเรียกผ่าน extendedProps
      });
      $("#calendarmodal").modal(); // แสดง modal
    }
  </script>


  <?php
  include '../components/footer.php';
  ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>