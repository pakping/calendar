<?php
$fullcalendar_path = "fullcalendar-4.4.2/packages/";
$content = 'everyone';
require "../DB/connect.php";
include '../auth/Sessionpersist.php';

if (isset($_POST['roomid'])) {
	$roomid = $_POST['roomid'];
	if ($_POST['roomid'] != '0') {
		$Squery = "SELECT * FROM room where roomid = '$roomid' ";
		if ($result = mysqli_query($con, $Squery)) {
			while ($room = mysqli_fetch_array($result)) {
				$roomname = $room['roomname'];
			}
		}
	} else {
		$roomname = 'ห้องทั้งหมด';
	}
	$_SESSION['roomid'] = $roomid;
	$_SESSION['roomname'] = $roomname;
} else if (isset($_SESSION['roomid'])) {
	$roomid = $_SESSION['roomid'];
	$roomname = $_SESSION['roomname'];
} else {
	$roomid = '0';
	$roomname = 'เลือกห้องที่ต้องการดู';
}
if ($roomid == '0') {
	$sql = "SELECT * FROM tbl_event where (statid = '1' or statid = '3')";
} else {
	$sql = "SELECT * FROM tbl_event where roomid='$roomid' and (statid = '1' and statid = '3')";
}
$_SESSION['sql'] = $sql;
/* echo 'roomid =' . $roomid . '<br>';
echo 'roomname ='  . $roomname ; */
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset='utf-8' />
	<title>UP Calendar</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="../css/color.css">

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
	<?php
	include '../components/cnd.php';
	?>
</head>

<body>
	<?php
	if ($_SESSION['type'] == 'admin') {
		include '../components/navbaradmin.php';
	} else {
		include '../components/nav.php';
	}
	
	?>
	<br>
	<br>
	<div class="container">
		<div class="box has-background">
			<div class="container is-max-desktop">
				<div class="control is-expanded">
					<div class="select is-fullwidth">
						<form action="" method="POST">
							<select name="roomid" onchange="this.form.submit()">
								<?php if ($roomid == '0') { ?>
									<option value="0" selected>ห้องทั้งหมด</option>
								<?php } else { ?>
									<option value="<?php echo $roomid; ?>" selected><?php echo $roomname; ?></option>
									<option value="0">ห้องทั้งหมด</option>
								<?php } ?>
								<?php

								$Squery = "SELECT * FROM room where roomid !='$roomid' ";
								if ($result = mysqli_query($con, $Squery)) {
									while ($room = mysqli_fetch_array($result)) {
								?> <option value="<?php echo $room['roomid']; ?>"><?php echo $room['roomname']; ?></option>

								<?php }
								}
								?>
							</select>
						</form>
					</div>
				</div>
			</div>
			<br>
			<div id='calendar'></div>
		</div>
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
	<style>
		.tag:not(body).is-purple {
			background-color: hsl(294, 71%, 79%);
			color: #fff;
		}
	</style>

	<?php
	include '../components/footer.php';
	?>
</body>

</html>