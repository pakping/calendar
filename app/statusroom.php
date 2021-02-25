<?php
$content = 'user';
include '../auth/Sessionpersist.php';
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
        <table class="table is-fullwidth is-hoverable">
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