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
	<?php
	/* include '../css/bootstrap.php'; */
	?>
</head>
<?php
include '../components/navbaradmin.php';
?>

<body class="font-mali vh-100 d-flex justify-content-center align-items-center">


	<section class="section">
		<div class="container">
			<div class="notification is-primary">
				<strong>ระบบสมัครสมาชิก </strong>
			</div>
		</div>
	</section>
	<section class="section">
		<form action="../DB/dbregister.php" class="mb-3" method="POST">

			<div class="columns">
				<div class="column is-4 is-offset-4">
					<div class="field">
						<label class="label">ชื่อของคุณ</label>
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
						<label class="label">ชื่อของคุณ</label>
						<div class="control has-icons-left has-icons-right">

							<input class="input" name="lname" id="lname" type="text" placeholder="นามสกุล" required>
							<span class="icon is-small is-left">
								<i class="fa fa-user-edit"></i>
							</span>
							<span class="icon is-small is-right">
								<i class="fa fa-check"></i>
							</span>
						</div>
						<p class="help is-success">This First name and last name is available</p>
					</div>


					<div class="field">
						<label class="label">ชื่อที่ใช้เข้าระบบ</label>
						<div class="control has-icons-left has-icons-right">

							<input class="input" name="uname" id="name" type="text" placeholder="abcd@up.ac.th" required>
							<span class="icon is-small is-left">
								<i class="fa fa-user"></i>
							</span>
							<span class="icon is-small is-right">
								<i class="fa fa-check"></i>
							</span>
						</div>
						<p class="help is-success">This username is available</p>
					</div>


					<div class="field">
						<label class="label">สร้างรหัสผ่านใหม่</label>
						<div class="control has-icons-left has-icons-right">

							<input class="input" name="psw" id="password" type="password" placeholder="password" required>
							<span class="icon is-small is-left">
								<i class="fa fa-lock"></i>
							</span>
							<span class="icon is-small is-right">
								<i class="fa fa-check"></i>
							</span>
						</div>
					</div>


					<div class="field">
						<label class="label">กรอกรหัสผ่านอีกครั้ง</label>
						<div class="control has-icons-left has-icons-right">

							<input class="input" name="psw-repeat" id="p-repeat" type="password" placeholder="password" required>
							<span class="icon is-small is-left">
								<i class="fa fa-lock"></i>
							</span>
							<span class="icon is-small is-right">
								<i class="fa fa-check"></i>
							</span>
						</div>
						<p class="help is-success">This password is available</p>
					</div>

					<div class="field">
						<label class="label">อีเมลของคุณ</label>
						<div class="control has-icons-left has-icons-right">

							<input class="input" name="email" id="email" type="email" placeholder="Email input" required>
							<span class="icon is-small is-left">
								<i class="fa fa-envelope"></i>
							</span>
							<span class="icon is-small is-right">
								<i class="fa fa-warning"></i>
							</span>
						</div>
						<p class="help is-danger">This email is invalid</p>
					</div>
					<div class="field">
						<label class="label">เบอร์โทรศัพท์ของคุณ</label>
						<div class="control has-icons-left has-icons-right">

							<input class="input" name="phone" id="phone" type="tel" placeholder="09-1234-5678" required>
							<span class="icon is-small is-left">
							<i class="fas fa-phone-square-alt"></i>
							</span>
						</div>


						<div class="field">
							<div class="control">
								<label class="checkbox">
									<input type="checkbox">
									ฉันยอมรับ<a href="#">ข้อกำหนดและเงื่อนไข</a>
								</label>
							</div>
						</div>
						<div class="field is-grouped">
							<div class="control">
								<button class="button is-link">สมัครสมาชิก</button>
							</div>
						</div>
					</div>
				</div>
		</form>
	</section>
</body>

</html>