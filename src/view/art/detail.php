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

	<div id="content">
		
	</div>
	<a class="apply-button" href="">Apply</a>
</div>
<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js']. 'art/menu.js' ?>"></script>
<script>
	getDetail(<?= $_GET['id'] ?>)
		.then(function (response) {
			const dataContent = document.getElementById('content');
			let content = "";

			response.data.forEach(data => {
				content += `
					<div class="card">
						<div class="detail-left">
							<img src="${data.thumbnail}" alt="gambar.png">
							<p style="font-weight: bold; font-size: 20px;">GAJI: Rp. ${data.job_payment}</p>
							<h1>Rumah ${data.finder}</h1>
							<p style="font-weight: 500; color: #000000; font-size: 17px; margin-bottom: 15px;">${data.address}</p>
							<div class="col-6 finder">
								<img src="../../assets/img/avatar.png" alt="avatar">
								<p style="font-weight: 600; font-size: 20px; padding: 20px 0 5px 0;">${data.finder}</p><br>
								<p>Kontak: ${data.contact}</p>
							</div>
						</div>
						<div class="detail-right">
							<p style="font-weight: 600;">DESKRIPSI</p>
							${data.job_description}
						</div>
					</div>
					`
			});
			dataContent.innerHTML = content;
		})
</script>
<?php require $app['template'] . 'art/footer.php' ?>