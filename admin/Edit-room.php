<?php
$content = 'admin';
include '../auth/Sessionpersist.php';
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

</head>

<body>

  <?php
  include '../components/navbaradmin.php';
  ?>

  <section class="section">
    <div class="container">
      <div class="notification is-primary">
        <strong>เพิ่มห้องประชุม</strong>
      </div>
      <?php
      if (isset($_POST['sentid'])) {
        $_SESSION['currentroom'] = $_POST['sentid'];
      }
      $CRid = $_SESSION['currentroom'];
      $setid = '0';
      require "../DB/connect.php";
      $Squery = "SELECT * FROM room Where roomid = '$CRid'";
      if ($result = mysqli_query($con, $Squery)) {
        while ($room = mysqli_fetch_array($result)) {

      ?>
          <form action="../function/editroom.php" method="POST" enctype="multipart/form-data">
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">ชื่อ</label>
              </div>
              <div class="field-body">
                <div class="field">

                  <input class="input" type="text" name="roomname" value="<?php echo $room['roomname']  ?>">

                </div>
              </div>
            </div>



            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">ความจุห้อง</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input class="input" type="number" name="roomcap" value="<?php echo $room['roomcap']  ?>">
                  </div>
                  <p class="help-number">
                  </p>
                </div>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field-label">

                <label class="label">คอมพิวเตอร์มีหรือไม่</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <label class="radio">
                      <input type="radio" name="com" value='1' <?php if ($room['com'] == '1') {
                                                                  echo "checked";
                                                                } ?>>
                      Yes
                    </label>
                    <label class="radio">
                      <input type="radio" name="com" value='0' <?php if ($room['com'] == '0') {
                                                                  echo "checked";
                                                                } ?>>
                      No
                    </label>


                  </div>
                </div>

              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label">

                <label class="label">มีไมโครโฟนหรือ</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <label class="radio">
                      <input type="radio" name="mic" value='1' <?php if ($room['mic'] == '1') {
                                                                  echo "checked";
                                                                } ?>>
                      Yes
                    </label>
                    <label class="radio">
                      <input type="radio" name="mic" value='0' <?php if ($room['mic'] == '0') {
                                                                  echo "checked";
                                                                } ?>>
                      No
                    </label>


                  </div>
                </div>

              </div>
            </div>


            <div class="field is-horizontal">
              <div class="field-label">

                <label class="label">มีจอทีวีหรือไม่</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <label class="radio">
                      <input type="radio" name="screen" value='1' <?php if ($room['screen'] == '1') {
                                                                    echo "checked";
                                                                  } ?>>
                      Yes
                    </label>
                    <label class="radio">
                      <input type="radio" name="screen" value='0' <?php if ($room['screen'] == '0') {
                                                                    echo "checked";
                                                                  } ?>>
                      No
                    </label>
                    <input type='hidden' name='roomid' value='<?php echo $room['roomid']; ?>'>

                  </div>
                </div>

              </div>
            </div>
        <?php
          $setid = $room['roomid'];
        }
      }
        ?>
        <div class="field is-horizontal">
          <div class="field-label">
            <!-- Left empty for spacing -->
          </div>
          <div class="field-body">
            <div class="field">
              <div class="control">
                <button class="button is-primary">
                  Send
                </button>
              </div>
          </form>
          <br>
          <form action="../function/deleteroom.php" method="POST">
            <div class="field">
              <button class="button is-primary">
                Delete
              </button>
            </div>
            <input type="hidden" value="<?php echo $setid; ?>" name="delid">
          </form>
    </div>
    </div>
    </div>
    </div>
  </section>



</body>

</html>