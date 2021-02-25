<?php
$content = 'user';
include '../auth/Sessionpersist.php';
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
    ิ<br><br>
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
                    <th>เวลาที่จอง</th>
                    <th>สถานะการจอง</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = 1;
                while ($a <= 10) {
                ?>
                    <tr>
                        <th><?php echo $a; ?></th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <span class="tag is-success">ผ่าน</span>
                            <span class="tag is-warning">รออนุมัติ</span>
                            <span class="tag is-danger">ยกเลิก</span>
                        </td>
                        <td>
                            <div class="buttons has-addons">
                                <form action="../app/detail.php" method="post"><button class="button is-warning is-outlined" type="submit">แก้ไข</button></form>
                                <form action="" method="post"><button class="button is-danger is-outlined" type="submit">ลบ</button></form>
                            </div>
                        </td>
                    </tr>
                <?php
                    $a += 1;
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