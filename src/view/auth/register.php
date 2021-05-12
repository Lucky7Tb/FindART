<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link href="../../assets/css/register.css" rel="stylesheet">
	<link href="../../assets/css/style.css" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="container-register">
		<a href="../../../index.php">
			<img src="../../assets/img/findart_logo_2.png" alt="logo.png">			
		</a>

		<div class="form-control">
			<h2>Pendaftaran</h2>
			<form action="post" id="form-register">
				<div class="inner-form">
					<label for="nama">Nama</label>
					<input type="text" id="nama" name="nama" autocomplete="off" required>

					<label for="alamat">Alamat</label>
					<textarea type="text" id="alamat" name="alamat" autocomplete="off" required></textarea>

					<label for="provinsi">Provinsi</label>
					<select class="select" type="text" id="provinsi" name="provinsi" required></select>

					<label for="kota">Kota</label>
					<select class="select" type="text" id="kota" name="kota" required></select>

					<label for="kecamatan">Kecamatan</label>
					<select class="select" type="text" id="kecamatan" name="kecamatan" required></select>

					<label for="kelurahan">Kelurahan</label>
					<select class="select" type="text" id="kelurahan" name="kelurahan" required></select>

					<label for="telepon">No Telepon</label>
					<input type="text" id="telepon" name="telepon" required>

					<label for="username">Username</label>
					<input type="text" id="username" name="username" autocomplete="off" required>

					<label for="password">Password</label>
					<input type="password" name="password" id="password" required>

					<label for="con-password">Confirm Password</label>
					<input type="password" name="con-password" id="con-password" required>

					<label for="mendaftar">Mendaftar Sebagai</label>
					<select class="select" name="mendaftar" id="mendaftar" onchange="toggleSkill(this)" required>
						<option value="1">ART</option>
						<option value="0">Pencari ART</option>
					</select>

					<div id="art_skill_container">
						<label for="art_skill">Skill</label>
						<select class="select" name="art_skill" id="art_skill" multiple>
							<option value="mencuci">Mencuci</option>
							<option value="memasak">Memasak</option>
							<option value="bersih-bersih rumah">Bersih-bersih rumah</option>
							<option value="bahasa inggris">Bahasa inggris</option>
						</select>
					</div>
				</div>
				<button type="submit" class="primary-button-lg" id="btn-register" name="register">Register</button>
				<a href="login.php">
					<h3>Sudah punya akun?</h3>
				</a>
			</form>
		</div>

	</div>
	<script src="../../assets/js/app.js"></script>
	<script src="../../assets/js/auth/register.js"></script>
</body>
</html>