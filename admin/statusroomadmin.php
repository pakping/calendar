<?php
$content = 'admin';
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
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.css">

</head>

<body>


    <?php
    include '../components/navbaradmin.php';
    ?>
    <!-- Navigation -->
    <br><br>
    <div class="container is-fullhd">
        <div class="notification is-primary">
            <strong>สถานะการจอง</strong>
        </div>
        <!-- <p class="is-size-2">
            สถานะการจอง
        </p> -->
        <br>

        <table id="myTable" class="table is-fullwidth is-hoverable">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ห้องประชุม</th>
                    <th>หัวข้อกิจกรรม</th>
                    <th>สถานะการจอง</th>
                    <th>action</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require '../DB/connect.php';
                $result = mysqli_query($con, "SELECT * FROM tbl_event left join room ON tbl_event.roomid=room.roomid left join stat ON tbl_event.statid=stat.statid");

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
                                <div class="field has-addons">
                                    <?php
                                    if ($row['statid'] == '2') {
                                    ?>
                                        <form action="../function/updatestatus.php" method="post">
                                            <input type="hidden" name="idstatus" value="<?php echo $row['event_id']; ?>">
                                            <input type="hidden" name="idstat" value="1">
                                            <button class="button control" type="submit">ผ่าน</button>
                                        </form>
                                        <form action="../function/updatestatus.php" method="post">
                                            <input type="hidden" name="idstatus" value="<?php echo $row['event_id']; ?>">
                                            <input type="hidden" name="idstat" value="4">
                                            <button class="button control" type="submit">ไม่ผ่าน</button>
                                        </form>
                                    <?php
                                    }
                                    ?>

                                    <!-- <form action="" method="post">
                                        <input type="hidden" value="<?php //$row['event_id']; 
                                                                    ?>">
                                        <div class="button is-info control" id="modal">คำสั่ง</div>

                                        <div class="modal">
                                            <div class="modal-background"></div>
                                            <div class="modal-card">
                                                <header class="modal-card-head">
                                                    <p class="modal-card-title">เลือกสถานะ</p>
                                                    <button class="delete" aria-label="close" id="close"></button>
                                                </header>
                                                <section class="modal-card-body">
                                                    <div class="field is-horizontal">
                                                        <div class="field-label is-normal">
                                                            <label class="label">สถานะ</label>
                                                        </div>
                                                        <div class="field-body">
                                                            <div class="field">
                                                                <p class="control">
                                                                <div class="select ">
                                                                    <select>
                                                                        <option value="ผ่าน">ผ่าน</option>
                                                                        <option value="ไม่ผ่าน">ไม่ผ่าน</option>
                                                                    </select>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <footer class="modal-card-foot">
                                                    <button class="button is-success">ตกลง</button>
                                                    <button class="button">ยกเลิก</button>
                                                </footer>
                                            </div>
                                        </div>
                                    </form> -->
<!--                                     <form action="../app/editdetail.php" method="post"><input type="hidden" name="eventid" value="<?php echo $row['event_id']; ?>"><button class="button is-warning is-outlined control" type="submit">แก้ไข</button></form>
                                    <form action="../function/delete.php" method="post"><input type="hidden" name="id_event" value="<?php echo $row['event_id']; ?>"><button class="button is-danger is-outlined control" type="submit">ลบ</button></form> -->
                                    <form action="../app/detail.php" method="post"><input type="hidden" name="eventid" value="<?php echo $row['event_id']; ?>"><button class="button is-primary is-outlined control" type="submit">รายละเอียด</button></form>
                                    
                                </div>
                            </td>
                            <td>
                                    <?php echo $row['Username']; ?>
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
    <script type="text/javascript" charset="utf8" src="../DataTables/datatables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <!-- modal -->
    <script>
        // $a = 1;
        // while ($a <= 10) {
        //     const actionbutton = document.querySelector('#modal'.$a);
        //     const close = document.querySelector('#close');
        //     const modal = document.querySelector('.modal');

        //     actionbutton.addEventListener('click', () => {
        //         modal.classList.add('is-active');
        //     });

        //     close.addEventListener('click', () => {
        //         modal.classList.remove('is-active');
        //     });
        //     $a += 1;
        // }
    </script>

</body>

</html>