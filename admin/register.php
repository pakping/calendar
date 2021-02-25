<?php
$content = 'admin';
include '../auth/sessionpersist.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<?php
	/* include '../css/bootstrap.php'; */
	?>
</head>
<?php
  include '../components/navbaradmin.php';
  ?>
<body class="font-mali vh-100 d-flex justify-content-center align-items-center">
	<div class="card mb-3">
		<div class="card-header bg-primary text-white">
			<h4>สมัครใช้งาน</h4>
		</div>
		<div class="card-body">
			<form action="../DB/dbregister.php" class="mb-3" method="POST">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="uname" id="name" class="form-control" required>
				</div>
				
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="psw" id="password" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="p-repeat">Confirm your password</label>
					<input type="password" name="psw-repeat" id="p-repeat" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-primary">Register</button>
			</form>
		</div>
	</div>
</body>

</html>