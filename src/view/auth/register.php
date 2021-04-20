<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link href="../../assets/css/register.css" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="container">
		<img src="../../assets/img/findart_logo.png" alt="logo.png">
		<h1>FindART</h1>

		<div class="form-control">
			<h2>Pendaftaran</h2>
			<form action="post" id="form-register">
				<div class="inner-form">
					<label for="nama">Nama</label><br>
					<input type="text" id="nama" name="nama" autocomplete="off" required><br>

					<label for="alamat">Alamat</label><br>
					<textarea type="text" id="alamat" name="alamat" autocomplete="off" required></textarea><br>

					<label for="provinsi">Provinsi</label>
					<select class="select" type="text" id="provinsi" name="provinsi" required></select><br>

					<label for="kota">Kota</label><br>
					<select class="select" type="text" id="kota" name="kota" required></select><br>

					<label for="kecamatan">Kecamatan</label>
					<select class="select" type="text" id="kecamatan" name="kecamatan" required></select><br>

					<label for="kelurahan">Kelurahan</label><br>
					<select class="select" type="text" id="kelurahan" name="kelurahan" required></select><br>

					<label for="telepon">No Telepon</label><br>
					<input type="text" id="telepon" name="telepon" required><br>

					<label for="username">Username</label><br>
					<input type="text" id="username" name="username" autocomplete="off" required><br>

					<label for="password">Password</label><br>
					<input type="password" name="password" id="password" required><br>

					<label for="con-password">Confirm Password</label><br>
					<input type="password" name="con-password" id="con-password" required><br>

					<label for="mendaftar">Mendaftar Sebagai</label><br>
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
				<button id="btn-register" type="submit" name="register">Register</button>
			</form>
			<a href="login.php">Sudah punya akun?</a>
		</div>

	</div>
	<script src="../../assets/js/register.js"></script>
</body>
</html>