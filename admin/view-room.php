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
  include '../components/nav.php';
  ?>

  <br>
  <div class="container">
  <div class="notification is-primary">
      <strong>ห้องประชุม</strong>
    </div>
  </div>
  <section class="section">
    <h2 class="title is-size-6-mobile is-size-2-tablet"></h2>
    <div class="columns is-mobile is-multiline is-variable is-1">


      <div class="column is-12-mobile is-4-tablet is-3-desktop">
        <div class="box has-background-warning">
          <div class="card">
            <header class="header">
              <p class=" title is-6 card-header-title ">ห้องประชุมที่1</p>
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
              <a href="#" class="card-footer-item">Edit</a>
              <a href="#" class="card-footer-item">Delete</a>
            </footer>
          </div>
        </div>
      </div>




      <div class="column is-12-mobile is-4-tablet is-3-desktop">
        <div class="box has-background-warning">
          <div class="card">
            <header class="header">
              <p class=" title is-6 card-header-title ">ห้องประชุมที่2</p>
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
              <a href="#" class="card-footer-item">Edit</a>
              <a href="#" class="card-footer-item">Delete</a>
            </footer>
          </div>
        </div>
      </div>

      <div class="column is-12-mobile is-4-tablet is-3-desktop">
        <div class="box has-background-warning">
          <div class="card">
            <header class="header">
              <p class=" title is-6 card-header-title ">ห้องประชุมที่3</p>
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
              <a href="#" class="card-footer-item">Edit</a>
              <a href="#" class="card-footer-item">Delete</a>
            </footer>
          </div>
        </div>
      </div>

      <div class="column is-12-mobile is-4-tablet is-3-desktop">
        <div class="box has-background-warning">
          <div class="card">
            <header class="header">
              <p class=" title is-6 card-header-title ">ห้องประชุมที่4</p>
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
              <a href="#" class="card-footer-item">Edit</a>
              <a href="#" class="card-footer-item">Delete</a>
            </footer>
          </div>
        </div>
      </div>

    </div>
  </section>

  <footer class="footer" style="background-color:#ffb3b3">
    <div class="content has-text-centered">
      <p class="has-text-white-bis">
        <strong class="has-text-white-bis">Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
        <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
        is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
      </p>
    </div>
  </footer>
</body>

</html>

<style>
  .tag:not(body).is-purple {
    background-color: hsl(294, 71%, 79%);
    color: #fff;
  }
</style>