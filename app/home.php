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
  <title>UP</title>
</head>

<body>


  <?php
  include '../components/nav.php';
  ?>
  <!-- Navigation -->
  <?php
  include '../components/room.php';
  ?>
  <?php
  include '../components/footer.php';
  ?>

</body>

</html>