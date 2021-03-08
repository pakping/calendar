<?php
$content = 'admin';
include '../auth/sessionpersist.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/color.css">
	<?php
	/* include '../css/bootstrap.php'; */
	?>
</head>
<?php
include '../components/navbaradmin.php';
?>

<body>

	<section class="section">
		<form action="../DB/dbregister.php" class="mb-3" method="POST">
			<div class="box container">
				<div class="notification is-primary">
					<strong>ระบบสมัครสมาชิก </strong>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">ชื่อ-นามสกุล</label>
					</div>
					<div class="field-body">
						<div class="field">
							<div class="control has-icons-left has-icons-right">
								<input class="input" name="fname" id="fname" type="text" placeholder="ชื่อจริง" required>
								<span class="icon is-small is-left">
									<i class="fa fa-user-edit"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fa fa-check"></i>
								</span>
							</div>
						</div>
						<div class="field">
							<div class="control has-icons-left has-icons-right">

								<input class="input" name="lname" id="lname" type="text" placeholder="นามสกุล" required>
								<span class="icon is-small is-left">
									<i class="fa fa-user-edit"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fa fa-check"></i>
								</span>
							</div>
							<!-- <p class="help is-success">This First name and last name is available</p> -->
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">ชื่อที่ใช้เข้าระบบ</label>
					</div>
					<div class="field-body">
						<div class="field">
							<div class="control has-icons-left has-icons-right">
								<input class="input" name="uname" id="name" type="text" placeholder="Username" required>
								<span class="icon is-small is-left">
									<i class="fa fa-user"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fa fa-check"></i>
								</span>
								<!-- <p class="help is-success">This username is available</p> -->
							</div>
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">สร้างรหัสผ่านใหม่</label>
					</div>
					<div class="field-body">
						<div class="field">
							<div class="control has-icons-left has-icons-right">

								<input class="input" name="psw" id="password" type="password" placeholder="Password" required>
								<span class="icon is-small is-left">
									<i class="fa fa-lock"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fa fa-check"></i>
								</span>
							</div>
						</div>
						<div class="field">
							<div class="control has-icons-left has-icons-right">

								<input class="input" name="psw-repeat" id="p-repeat" type="password" placeholder="Confirm Password" required>
								<span class="icon is-small is-left">
									<i class="fa fa-lock"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fa fa-check"></i>
								</span>
							</div>
							<!-- <p class="help is-success">This password is available</p> -->
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">อีเมลของคุณ</label>
					</div>
					<div class="field-body">
						<div class="field">
							<div class="control has-icons-left has-icons-right">

								<input class="input" name="email" id="email" type="email" placeholder="Email" required>
								<span class="icon is-small is-left">
									<i class="fa fa-envelope"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fa fa-warning"></i>
								</span>
							</div>
							<!-- <p class="help is-danger">This email is invalid</p> -->
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">เบอร์โทรศัพท์ของคุณ</label>
					</div>
					<div class="field-body">
						<div class="field">
							<div class="control has-icons-left has-icons-right">

								<input class="input" name="phone" id="phone" type="tel" placeholder="09-1234-5678" required>
								<span class="icon is-small is-left">
									<i class="fas fa-phone-square-alt"></i>
								</span>
							</div>
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
					</div>
					<div class="field-body">
						<div class="field">
						<button type="submit" class="button is-link">สมัครสมาชิก</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</body>
</html>