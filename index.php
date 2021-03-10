<?php
session_start();
if (isset($_SESSION['Username'])) {
  if ($_SESSION['type'] == 'user') {
    header('location:app/home.php');
  } else if ($_SESSION['type'] == 'admin') {
    header('location:admin/view-room.php');
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-social@1/bin/bulma-social.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.0/css/all.min.css" />
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <section class="hero is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <div class="box ">
            <p class="subtitle is-5">ระบบจองห้องประชุม โรงพยาบาลมหาวิทยาลัยพะเยา</p>
            <br />

            <form action="auth/check_login.php" method="POST">
              <div class="field">
                <p class="control has-icons-left has-icons-right">
                  <input class="input is-medium" type="text" id="Username" name="uname" class="form-control" placeholder="Username" required autofocus>

                  <span class="icon is-medium is-left">
                    <i class="fas fa-user"></i>
                  </span>
                  <span class="icon is-medium is-right">
                    <i class="fas fa-check"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-left">
                  <input class="input is-medium" type="password" id="inputPassword" name="psw" class="form-control" placeholder="Password" required>
                  <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                  </span>
                </p>
              </div>
              <!-- <div class="field">
                <label class="checkbox"><input type="checkbox" id="customCheck1" />Remember me</label>
              </div> -->
              <button class="button is-block is-info is-large is-fullwidth" type="submit">Login</button><br />

            </form>
          </div>
          <!-- <div class="box">
            <p class="has-text-primary">
              <a class="has-text-primary" href="#">Sign Up</a> &nbsp;·&nbsp;
              <a class="has-text-danger" href="#">Forgot Password</a> &nbsp;·&nbsp;
              <a class="has-text-link" href="#">Need Help?</a>
            </p>
          </div> -->
        </div>
      </div>
    </div>

  </section>
</body>

</html>