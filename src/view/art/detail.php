<?php
require __DIR__ . '/../../config/app.php';
require __DIR__ . '/../../helpers/helpers.php';
$app = config();
require $app['template'] . 'art/header.php';
?>

<div class="container">

	<?php require $app['template'] . 'art/navbar.php'; ?>

	<form action="">
		<select name="provinsi" id="provinsi" placeholder="Provinsi">
			<option value="" disabled selected hidden>Provinsi</option>
		</select>
		<select name="kota" id="kota">
			<option value="" disabled selected hidden>Kota</option>
		</select>
		<input type="submit" name="cari" id="cari" value="Cari">
	</form>

	<div class="card">
		<div class="detail-left">
			<img src="../../assets/img/contoh.png" alt="gambar.png">
			<p style="font-weight: bold; font-size: 20px;">GAJI: 1.800.000</p>
			<h1>Rumah Ibu Ratna</h1>
			<p style="font-weight: 500; color: #000000; font-size: 15px; margin-bottom: 15px;">Jl. Diponegoro, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115</p>
			<div class="col-5 finder">
				<img src="../../assets/img/avatar.png" alt="avatar">
				<p style="font-weight: 600; padding: 20px 0;">Ratna Diana</p><br>
				<a href="">Deskripsi pencari ART &nbsp; &#62;</a>
			</div>
		</div>
		<div class="detail-right">
			<p style="font-weight: 600;">DESKRIPSI</p>
			<p>-lorem</p>
			<p>-lorem</p>
			<p style="font-weight: 600;">lorem ipsum:</p>
			<p>-lorem</p>
			<p>-lorem</p>
			<p>-lorem</p>
			<p style="font-weight: 600;">lorem ipsum:</p>
			<p>-lorem</p>
			<p>-lorem</p>
		</div>
	</div>
	<a class="apply-button" href="">Apply</a>
</div>
<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<?php require $app['template'] . 'art/footer.php' ?>