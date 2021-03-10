<?php
$content = 'everyone';
include '../auth/Sessionpersist.php';
$user = $_SESSION['Username'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>UP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.css">


</head>

<body>


    <?php
    include '../components/nav.php';
    ?>
    <!-- Navigation -->
    <br><br>
    <div class="container is-fullhd">
        <div class="box">
            <section class="hero is-primary">
                <div class="hero-body">
                    <div class="container has-text-centered">
                        <h1 class="title">
                            สถานะการจอง
                        </h1>
                    </div>
                </div>

                <nav class="tabs is-fullwidth is-large">
                    <div class="container">
                        <ul>
                            <li class="tab is-active" onclick="openTab(event,'WebDev')"><a>ตารางจองห้อง</a></li>
                            <li class="tab" onclick="openTab(event,'WebAud')"><a>ตารางจองรถยนต์</a></li>
                        </ul>
                    </div>
                </nav>

            </section>

            <div class="container section">
                <div id="WebDev" class="content-tab">
                    <div class="notification is-primary">
                        <strong>สถานะการจองห้อง</strong>
                    </div>
                    <!-- <p class="is-size-2">จองห้อง</p>
                    <br> -->
                    <table id="myTable" class="table is-fullwidth is-hoverable">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ห้องประชุม</th>
                                <th>หัวข้อกิจกรรม</th>
                                <th>สถานะการจอง</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require '../DB/connect.php';
                            $result = mysqli_query($con, "SELECT * FROM tbl_event left join room ON tbl_event.roomid=room.roomid left join stat ON tbl_event.statid=stat.statid Where Username = '$user' and state != 'ยกเลิก' ");

                            if ($result) {
                                $a = 1;
                                while ($row = mysqli_fetch_array($result)) {

                                    if ($row['statid'] == '1') {
                                        $stat = '<span class="tag is-success">ผ่าน</span>';
                                    } elseif ($row['statid'] == '2') {
                                        $stat = '<span class="tag is-warning">รอดำเนินการ</span>';
                                    } elseif ($row['statid'] == '3') {
                                        $stat = '<span class="tag is-danger">สิ้นสุด</span>';
                                    } elseif ($row['statid'] == '4') {
                                        $stat = '<span class="tag is-danger">ไม่ผ่าน</span>';
                                    } elseif ($row['statid'] == '5') {
                                        $stat = '<span class="tag is-danger">ยกเลิก</span>';
                                    }
                            ?>
                                    <tr>
                                        <th><?php echo $a; ?></th>
                                        <td><?php echo $row['roomname']; ?></td>
                                        <td><?php echo $row['event_title']; ?></td>
                                        <td>
                                            <?php echo $stat; ?>
                                        </td>
                                        <td>
                                            <div class="buttons has-addons">
                                                <form action="../app/detail.php" method="post"><input type="hidden" name="eventid" value="<?php echo $row['event_id']; ?>"><button class="button is-primary is-outlined" type="submit">รายละเอียด</button></form>
                                                <form action="../app/editdetail.php" method="post"><input type="hidden" name="eventid" value="<?php echo $row['event_id']; ?>"><button class="button is-warning is-outlined" type="submit">แก้ไข</button></form>
                                                <form action="../function/updatestatus.php" method="post"><input type="hidden" name="idstatus" value="<?php echo $row['event_id']; ?>"><input type="hidden" name="idstat" value="5"><button class="button is-danger is-outlined" type="submit">ลบ</button></form>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                    $a += 1;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="WebAud" class="content-tab" style="display:none">

                    <!-- <p class="is-size-2">จอง</p> -->
                    <div class="notification is-primary">
                        <strong>สถานะการจองรถยนต์</strong>
                    </div>

                    <table id="myTable2" class="table is-fullwidth is-hoverable">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>หัวข้อกิจกรรม</th>
                                <th>รถ</th>
                                <th>เวลาดำเนินการ</th>
                                <th>สถานะการจอง</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require '../DB/connect.php';
                            $result = mysqli_query($con, "SELECT * FROM cars_event left join cars ON cars_event.cars_id=cars.cars_id left join stat ON cars_event.statid=stat.statid Where Username = '$user' and state != 'ยกเลิก' ");

                            $startdate = date('d/m/Y');
                            $enddate = date('d/m/Y');
                            if ($result) {
                                $a = 1;
                                $b = 1;
                                $c = 'cat';
                                while ($row = mysqli_fetch_array($result)) {
                                    if ($c == $row['event_title']) {
                                        $b = 0;
                                    } else {
                                        $b = 1;
                                        $c = $row['event_title'];
                                    }
                                    $c = $row['event_title'];
                                    if ($row['statid'] == '1') {
                                        $stat = '<span class="tag is-success">ผ่าน</span>';
                                    } elseif ($row['statid'] == '2') {
                                        $stat = '<span class="tag is-warning">รอดำเนินการ</span>';
                                    } elseif ($row['statid'] == '3') {
                                        $stat = '<span class="tag is-danger">สิ้นสุด</span>';
                                    } elseif ($row['statid'] == '4') {
                                        $stat = '<span class="tag is-danger">ไม่ผ่าน</span>';
                                    } elseif ($row['statid'] == '5') {
                                        $stat = '<span class="tag is-danger">ยกเลิก</span>';
                                    }
                            ?>
                                    <tr>

                                        <th><?php echo $a;
                                            $phpdate = strtotime($row['event_startdate']);
                                            $sdate = date('d/m/Y', $phpdate);
                                            $ephpdate = strtotime($row['event_enddate']);
                                            $edate = date('d/m/Y', $ephpdate); ?></th>
                                        <td><?php if ($b == 1) {
                                                echo $row['event_title'];
                                            } ?></td>
                                        <td><?php echo $row['cars_type'] . ' ' . $row['cars_name']; ?></td>
                                        <td><?php echo  $sdate . ' ถึง ' . $edate; ?></td>
                                        <td>
                                            <?php echo $stat; ?>
                                        </td>
                                        <td>
                                            <div class="buttons has-addons">
                                                <form action="../app/detailformcars.php" method="post"><input type="hidden" name="eventid" value="<?php echo $row['event_id']; ?>"><button class="button is-primary is-outlined" type="submit">รายละเอียด</button></form>
                                                <!-- <form action="../app/editdetail.php" method="post"><input type="hidden" name="eventid" value="<?php echo $row['event_id']; ?>"><button class="button is-warning is-outlined" type="submit">แก้ไข</button></form> -->
                                                <form action="../function/updatestatuscars.php" method="post"><input type="hidden" name="idstatus" value="<?php echo $row['event_id']; ?>"><input type="hidden" name="idstat" value="5"><button class="button is-danger is-outlined" type="submit">ลบ</button></form>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                    $a += 1;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

    <?php
    include '../components/footer.php';
    ?>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="../DataTables/datatables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        $(document).ready(function() {
            $('#myTable2').DataTable();
        });

        function openTab(evt, tabName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("content-tab");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tab");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" is-active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " is-active";
        }
    </script>
</body>

</html>