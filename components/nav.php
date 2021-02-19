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
      <a class="navbar-item" href="home.php">
        หน้าหลัก
      </a>

      <a class="navbar-item" href="">
        ห้องประชุม
      </a>
      <a class="navbar-item" href="calendar.php">
        ตารางปฏิทิน
      </a>
      <a class="navbar-item" href="form_calendar.php">
        จองห้อง
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            คุณ 
          </a>

          <div class="navbar-dropdown ">
            <!-- Other navbar items -->
            <form action="" method="post">
              
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
<!-- <nav class="navbar navbar-light" style = " background-color:#6610f2;">
  <div class="container-fluid justify-content-md-center">
    <span class="navbar-text">
      <h5 class="textnavbar md-4 ">ระบบจองห้องประชุมโรงพยาบาลมหาวิทยาลัยพะเยา</h5>
    </span>
  </div>
</nav>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand">UP-MED</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      <span class="navbar-toggler-icon"></span>
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " href="home.php">หน้าหลัก</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="calendar.php">ห้องประชุม</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="calendar.php">ตารางปฏิทิน </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="form_calendar.php">จองห้อง</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      <div class="dropdown me-1">
    <button type="button" class="btn dropdown-toggle" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
      <img src="avatar.png" alt="Avatar" class="avatar">
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
      <li><a class="dropdown-item" href="#">ออกจากระบบ</a></li>
    
    </ul>
    &emsp; &emsp; &emsp;
  </div>
      </ul>
    </div>
  </div>
</nav>


<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:ital,wght@0,300;0,400;1,400&display=swap');
html,
body {
    font-family: 'Poppins';
    font-size: 15px;
    line-height: 1.5;
    box-sizing: border-box;
    margin: 0;
    top: 0;
    left: 0;
}

a {
    text-decoration: none;
    color: rgba(34, 54, 69, .7);
    font-weight: 500;
}

a:hover {
    color: #e74c3c;
}

ul {
    list-style-type: none;
}

.navbar {
    background: white;
    /*  padding: 0.5rem 1rem; */
    min-height: 12vh;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .2);
}

.navbar .navbar-brand a {
    padding: 1rem 0;
    display: block;
    text-decoration: none;
}

.navbar-light .navbar-brand {
    color: #f7cb09;
}

.navbar-brand {
    font-family: 'Pacifico', cursive;
    font-size: 2.5rem;
    color: #f7cb09;
}

.navbar-toggler {
    background: #f7cb09;
    border: none;
    padding: 10px 6px;
    outline: none;
}

.navbar-toggler span {
    display: block;
    width: 22px;
    height: 2px;
    border: 1px;
    background: #fff;
}

.navbar-toggler span+span {
    margin-top: 4px;
    width: 18px;
    margin-left: 4px;
}

.navbar-toggler span+span+span {
    width: 10px;
    margin-left: 10px;
}

.navbar-expand-lg .navbar-nav .nav-link {
    padding: 2rem 1.2rem;
    font-size: 1.2rem;
    position: relative;
}

.navbar-expand-lg .navbar-nav .nav-link:hover {
    border-top: 4px solid #f7cb09;
}

.navbar-expand-lg .navbar-nav .nav-link:active {
    border-top: 4px solid #f7cb09;
    color: #f7cb09;
}

.navbar-nav button {
    padding: 1.2rem 0;
}

.navbar-nav .btn {
    background-color: #f7cb09;
    color: white;
    border-radius: 25;
    padding: 0.5rem 1.2rem;
    font-size: 1.2rem;
    margin-top: -10px;
}

.navbar-nav .btn:hover {
    background-color: #0a3d62;
}

.textnavbar {
    font-weight: 300;
    color: #fff;
  
}
</style> -->