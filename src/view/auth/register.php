<?php
	require __DIR__.'/../../config/app.php';
	require __DIR__.'/../../helpers/helpers.php';
	checkUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link href='//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
	<link href="<?= BASEURL . '/src/assets/css/bootstrap.min.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?= BASEURL . '/src/assets/css/register.css' ?>" rel="stylesheet">
</head>

<body>

	<div class="container">
		<div class="form-container mx-auto mt-5">
			<div class="mb-3">
				<a href="../../../index.php">
					<img src="../../assets/img/findart_logo_2.png" class="img-responsive d-block mx-auto" alt="logo.png">			
				</a>
			</div>
			<form id="form-register">
				<div class="row">
					<div class="col-6">
						<div class="form-grup">
							<label for="nama">Nama</label>
							<input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="telepon">No Telepon</label>
							<input type="text" class="form-control" id="telepon" name="telepon" required>
						</div>
					</div>
					<div class="col-12 mt-2">
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea type="text" id="alamat" name="alamat" class="form-control" rows="5" autocomplete="off" required></textarea>
						</div>
					</div>
					<div class="col-6 mt-2">
						<div class="form-group">
							<label for="provinsi">Provinsi</label>
							<select class="form-select" id="provinsi" name="provinsi" required></select>
						</div>
					</div>
					<div class="col-6 mt-2">
						<div class="form-group">
							<label for="kota">Kota</label>
							<select class="form-select" type="text" id="kota" name="kota" required></select>
						</div>
					</div>
					<div class="col-6 mt-2">
						<div class="form-group">
							<label for="kecamatan">Kecamatan</label>
							<select class="form-select" type="text" id="kecamatan" name="kecamatan" required></select>
						</div>
					</div>
					<div class="col-6 mt-2">
						<div class="form-group">
							<label for="kelurahan">Kelurahan</label>
							<select class="form-select" type="text" id="kelurahan" name="kelurahan" required></select>
						</div>
					</div>
					<div class="col-12 mt-2">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
						</div>
					</div>
					<div class="col-6 mt-2">
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" id="password" required>
						</div>
					</div>
					<div class="col-6 mt-2">
						<div class="form-group">
							<label for="con-password">Confirm Password</label>
							<input type="password" class="form-control" name="con-password" id="con-password" required>
						</div>
					</div>
					<div class="col-12 mt-2">
						<label for="mendaftar">Mendaftar Sebagai</label>
						<select class="form-select" name="mendaftar" id="mendaftar" required>
							<option value="1">ART</option>
							<option value="0">Pencari ART</option>
						</select>
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-lg mt-2 d-block mx-auto" id="btn-register" name="register">Register</button>
				<a href="login.php" class="btn btn-link d-block mx-auto">
					<h5>
						<strong>Sudah punya akun?</strong>
					</h5>
				</a>
			</form>
		</div>
	</div>
	<script src="<?= BASEURL . '/src/assets/js/bootstrap.bundle.min.js' ?>"></script>
	<script src="<?= BASEURL . '/src/assets/js/app.js' ?>"></script>
	<script src="<?= BASEURL . '/src/assets/js/auth/register.js' ?>"></script>
</body>
</html>