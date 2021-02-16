<?php
$fullcalendar_path = "fullcalendar-4.4.2/packages/";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset='utf-8' />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="../css/navbar.css" rel="stylesheet" crossorigin="anonymous">
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
			width: 800px;
			margin: auto;
		}
	</style>
	<?php
	include '../components/cnd.php';
	?>
</head>

<body>
	<?php
	include '../components/nav.php';
	?>
	<br>
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


</body>

</html>