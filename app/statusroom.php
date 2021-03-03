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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

</head>

<body>


    <?php
    include '../components/nav.php';
    ?>
    <!-- Navigation -->
    <br><br>
    <div class="container is-fullhd">
        <p class="is-size-2">
            สถานะการจอง
        </p>
        <br>

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
                $result = mysqli_query($con, "SELECT * FROM tbl_event left join room ON tbl_event.roomid=room.roomid left join stat ON tbl_event.statid=stat.statid Where Username = '$user'");

                if ($result) {
                    $a = 1;
                    while ($row = mysqli_fetch_array($result)) {

                        if ($row['statid'] == '1') {
                            $stat = '<span class="tag is-success">ผ่าน</span>';
                        } elseif ($row['statid'] == '2') {
                            $stat = '<span class="tag is-warning">รอดำเนินการ</span>';
                        } elseif ($row['statid'] == '3') {
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
                                    <form action="../app/detail.php" method="post"><input type="hidden" name="eventid" value="<?php echo $row['event_id']; ?>"><button class="button is-warning is-outlined" type="submit">แก้ไข</button></form>
                                    <form action="../function/delete.php" method="post"><input type="hidden" name="id_event" value="<?php echo $row['event_id']; ?>"><button class="button is-danger is-outlined" type="submit">ลบ</button></form>
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

    <?php
    include '../components/footer.php';
    ?>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>