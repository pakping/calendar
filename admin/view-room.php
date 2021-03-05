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
  <link rel="stylesheet" type="text/css" href="../css/color.css">


</head>

<body>
  <?php
  include '../components/navbaradmin.php';
  ?>

  <section class="section">
  <div class="box">
  <div class="notification is-primary">
            <strong>จัดการห้องประชุม</strong>
        </div>
    <div class="columns is-mobile is-multiline is-variable is-1">
      <?php
      require "../DB/connect.php";
      $Squery = "SELECT * FROM room Order By roomname";
      if ($result = mysqli_query($con, $Squery)) {
        while ($room = mysqli_fetch_array($result)) {
      ?>
          <div class="column is-12-mobile is-4-tablet is-3-desktop">
        
              <div class="card">
                <header class="header">
                  <p class=" title is-6 card-header-title "><?php echo $room['roomname'] ?></p>
                </header>
                <div class="image">
                  <figure class="image is-4by3">
                    <img src=<?php echo $room['roomimg']; ?> alt="Placeholder image">
                  </figure>
                </div>
                <div class="card-content">
                  <div class="content">
                    <div class="tags are-medium">
                      <?php if ($room['com'] != '0') { ?>
                        <span class="tag is-normal is-primary">คอมพิวเตอร์</span>
                      <?php }
                      if ($room['screen'] != '0') { ?>
                        <span class="tag is-normal is-link">จอทีวี</span>
                      <?php }
                      if ($room['mic'] != '0') {  ?>
                        <span class="tag is-normal is-purple">ไมโครโฟน</span>
                      <?php } ?>
                      <span class="tag is-normal is-danger">รับได้ <?php echo $room['roomcap']  ?> ท่าน</span>
                    </div>
                    <br>
                    <!-- <time datetime="2016-1-1"><a href="#"># PM - 1 Jan 2021</a></time> -->
                  </div>
                </div>

                <form action="Edit-room.php" method="POST">
                  <div class="box has-text-centered">
                    <button class="button is-primary  " type="submit" href="#">Edit/Delete</button>
                    <input type="hidden" name='sentid' value="<?php echo $room['roomid']; ?>">
                  </div>
                </form>

                        
              </div>
            
          </div>
      <?php
        }
      }
      ?>


    </div>
  </section>
</body>

</html>