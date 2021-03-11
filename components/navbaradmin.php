<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
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
      <h5 class="title  is-indigo  is-5 ">ระบบจองห้องประชุมและขอใช้รถยนต์ UP-MED</h5>
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
      <a class="navbar-item" href="../app/form_calendar.php">
        จองห้อง
      </a>
      <a class="navbar-item" href="../app/calendar.php">
        ตารางปฏิทิน
      </a>
      <a class="navbar-item" href="../admin/statusroomadmin.php">
        อนุมัติการจอง
      </a>
      <a class="navbar-item" href="../admin/register.php">
        สมัครสมาชิก
      </a>
      <a class="navbar-item" href="../admin/insert-room.php">
        เพิ่มห้องประชุม
      </a>
    
    </div>

    <div class="navbar-end">
      <div class=" navbar-item">
        <div class="box navbar-item has-dropdown is-hoverable">
          <a class=" navbar-link">
            คุณ <?php
                echo $_SESSION['Username'];
                ?>
          </a>

          <div class="box navbar-dropdown ">
            <!-- Other navbar items -->
            <form action="../auth/logout.php" method="post">

              <button type="submit" class="button is-white">ออกจากระบบ</button>
            </form>
          </div>
        </div>

      </div>
    </div>
    <?php
      require '../DB/connect.php';
      $result = mysqli_query($con, "SELECT count(*) as total from tbl_event where statid = '2'");
      $data = mysqli_fetch_assoc($result);
      $result2 = mysqli_query($con,"SELECT count(*) as total2 from cars_event where statid = '2'");
      $data2 = mysqli_fetch_assoc($result2);
      $sum = $data['total'] + $data2['total2'];
      if ($sum > 0) {
      ?>
      <a class="navbar-item" href="../admin/statusroomadmin.php">
      

  <div class="container">
  
      <div class="tags has-addons">
        <span class="tag is-Tomato">มีคำร้องขอจองห้องประชุมหรือรถยนต์ </span> 
        <span class="tag is-warning "> <?php echo $sum; ?> </span> 
      </span>

      </div>
     
  </div>
      </a>

      <?php
      }

      ?>

  </div>
</nav>
<br><br>



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
  .is-indigo {
    color: rgba(141, 56, 201);
    font-size: 1.5rem;
    font-weight: 500;
    line-height: 1.125;
  }
  .tag:not(body).is-Tomato {
    background-color:#9370DB;
    color: #fff;
}
</style>