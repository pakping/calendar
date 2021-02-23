<main>
  <section class="section">
    <h2 class="title is-size-6-mobile is-size-2-tablet">ห้องประชุม</h2>
    <div class="columns is-mobile is-multiline is-variable is-1">

      <?php
      $a = 1;
      while ($a <= 8) {


      ?><a href="../app/roomcalendar.php">
          <div class="column is-12-mobile is-4-tablet is-3-desktop">
            <div class="box has-background-warning">
              <div class="card">
                <header class="header">
                  <p class=" title is-6 card-header-title ">ห้องประชุมที่<?php echo $a; ?></p>
                </header>
                <div class="image">
                  <figure class="image is-4by3">

                    <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">

                  </figure>
                </div>
                <div class="card-content">
                  <div class="content">
                    <div class="tags are-medium">
                      <span class="tag is-normal is-primary">คอมพิวเตอร์</span>
                      <span class="tag is-normal is-link">จอทีวี</span>
                      <span class="tag is-normal is-purple">ไมโครโฟน</span>
                      <span class="tag is-normal is-danger">รับได้ 50 ท่าน</span>
                    </div>
                    <br>
                    <time datetime="2016-1-1"><a href="#"># PM - 1 Jan 2021</a></time>
                  </div>
                </div>
                <footer class="card-footer">
                  <!-- <a href="#" class="card-footer-item">Edit</a>
              <a href="#" class="card-footer-item">Delete</a> -->
                </footer>
              </div>
            </div>
          </div>
        </a>
      <?php
        $a += 1;
      }
      ?>


    </div>
  </section>

</main>