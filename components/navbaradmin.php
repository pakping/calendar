<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar is-White" style="width: 100%; height: 85px; background-color: #673ab7;">
    <h1 style="margin: 0 auto; padding: 25px; color: white;">
      <img src="../logo/logo-2.png" width="250" height="150">
    </h1>
  </div>
</nav>

<nav class="navbar is-light" role="navigation" aria-label="main navigation" style="height: 85px;">
  <div class="navbar-brand">
    <a class="navbar-item" href="#">
      <h6 class="title is-6 ">ระบบจองห้องประชุม UP-MED</h6>
    </a>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar is-light">
      <a class="navbar-item" href="../admin/view-room.php">
        จัดการห้องประชุม
      </a>

<<<<<<< HEAD
      <a class="navbar-item" href="../admin/event-admin.php">
=======
      <a class="navbar-item" href="../admin/statusroomadmin.php">
>>>>>>> 92c5c6acc74b470ee31e75a630947284d8b32d7b
        อนุมัติการจองห้องประชุม
      </a>
      <a class="navbar-item" href="../admin/register.php">
        สมัครสมาชิก
      </a>
      <a class="navbar-item" href="../admin/insert-room.php">
        เพิ่มห้องประชุม
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

              <button type="submit" class="button is-light">ออกจากระบบ</button>
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
<style>
  .title {
    color: rgba(141, 56, 201);
  }
</style>