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
  <link rel="stylesheet" type="text/css" href="../css/color.css">

  <title>UP</title>
</head>

<body>


  <?php
  include '../components/nav.php';
  ?>
  <!-- Navigation -->

  <main>
  <section class="section">
	<div class="box">
  <div class="notification is-primary">
            <strong>จัดการห้องประชุม</strong>
        </div>
    <div class="columns is-mobile is-multiline is-variable is-1">
   
      <?php
      require "../DB/connect.php";
      $Squery = "SELECT * FROM room Order by roomname";
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
                <!-- <footer class="card-footer">
              <a href="#" class="card-footer-item">Edit</a>
              <a href="#" class="card-footer-item">Delete</a>
            </footer> -->
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>


    </div>
  </div>
  </section>

</main>
<style>

</style>
  
  <?php
  include '../components/footer.php';
  ?>
  

</body>

</html>