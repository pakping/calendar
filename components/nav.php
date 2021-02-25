<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar" style="width: 100%; height: 75px; background-color: #673ab7;">
    <h1 style="margin: 0 auto; padding: 25px; color: white;">
      โรงพยาบาลมหาลัยพะเยา
    </h1>
  </div>
</nav>

<nav class="navbar is-warning" role="navigation" aria-label="main navigation" style="height: 75px;">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar is-warning">
      <a class="navbar-item" href="../app/home.php">
        หน้าหลัก
      </a>

      <a class="navbar-item" href="">
        ห้องประชุม
      </a>
      <a class="navbar-item" href="../app/calendar.php">
        ตารางปฏิทิน
      </a>
      <a class="navbar-item" href="../app/form_calendar.php">
        จองห้อง
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            คุณ <?php
            echo $_SESSION['Username'];
            ?>
          </a>

          <div class="navbar-dropdown ">
            <!-- Other navbar items -->
            <form action="../auth/logout.php" method="post">
              
              <button type="submit" class="button">ออกจากระบบ</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

      // Add a click event on each of them
      $navbarBurgers.forEach(el => {
        el.addEventListener('click', () => {

          // Get the target from the "data-target" attribute
          const target = el.dataset.target;
          const $target = document.getElementById(target);

          // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
          el.classList.toggle('is-active');
          $target.classList.toggle('is-active');

        });
      });
    }

  });
</script>
