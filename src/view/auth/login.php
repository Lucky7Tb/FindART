<?php
	require __DIR__.'/../../config/app.php';
	require __DIR__.'/../../helpers/helpers.php';
	checkUser();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
	<link href="<?= BASEURL . '/src/assets/css/bootstrap.min.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?= BASEURL . '/src/assets/css/login.css' ?>" rel="stylesheet">
</head>

<body>
	<div class="container" style="margin-top: 5em">
		<div class="form-container mx-auto mt-5">
			<div class="mb-3">
				<a href="../../../index.php">
					<img src="../../assets/img/findart_logo_2.png" class="img-responsive d-block mx-auto" alt="logo.png">			
				</a>
			</div>
			<form class="mt-5" id="form-login">
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" class="form-control" autocomplete="off" autofocus required>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control" required>
						</div>
					</div>
					<div class="col-12 mt-3 mb-3">
						<button type="submit" class="btn btn-primary btn-lg d-block mx-auto" name="login">Login</button>
					</div>
				</div>
			</form>
			<a href="register.php" class="btn btn-link d-block mx-auto">
				<h5>
					<strong>Belum punya akun?</strong>
				</h5>
			</a>
		</div>

	</div>

	<script src="<?= BASEURL . '/src/assets/js/bootstrap.bundle.min.js' ?>"></script>
	<script src="<?= BASEURL . '/src/assets/js/app.js' ?>"></script>
	<script src="<?= BASEURL . '/src/assets/js/auth/login.js' ?>"></script>
</body>

</html>