<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'admin/header.php';
?>

<div class="container">
	<?php require $app['template'] . 'admin/navbar.php'; ?>

	<div class="row" id="art-container"></div>

</div>

<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'admin/job.js' ?>"></script>
<script>
	let content = "";
	getDetailART(<?= $_GET['id'] ?>)
		.then(function(response) {
			if (response.code === 404) {
				document.getElementById('art-container').innerHTML = "<h1 class='text-center'>ART Tidak ditemukan</h1>"
			} else if (response.code === 200) {
				const art = response.data[0];
				const artContainer = document.getElementById('art-container');
				content += `
					<div class="card" style="margin-top: 3em">
						<div class="row">
							<div class="col-12">
								<h1 class="text-center">${art.art_name}</h1>
								<img src="${art.art_photo}" class="d-block mx-auto" alt="Avatar" width="10%">
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<strong>Provinsi: ${art.province}</strong>
							</div>
							<div class="col-12">
								<strong>Kota: ${art.city}</strong>
							</div>
							<div class="col-12">
								<strong>Kecamatan: ${art.district}</strong>
							</div>
							<div class="col-12">
								<strong>Kelurahan: ${art.sub_district}</strong>
							</div>
							<div class="col-12">
								<strong>Alamat: ${art.address}</strong>
							</div>
							<div class="col-12">
								<strong>Alamat: ${art.art_description ? art.art_description : '-' }</strong>
							</div>
							<div class="col-12" id="skill-container">
							</div>
						</div>
					</div>
				`;
				artContainer.innerHTML = content;

				getSkillART(<?= $_GET['id'] ?>)
					.then(function(response) {
						const skillContainer = document.getElementById('skill-container');
						if (response.data.length === 0) {
							skillContainer.innerHTML = "<strong>Skill: - </strong>";
						} else {
							let content = "<strong>Skill: ";
							for (let i = 0; i < response.data.length; i++) {
								if (i == (response.data.length - 1)) {
									content += response.data[i].art_skill + ".";
								} else {
									content += response.data[i].art_skill + ", "
								}
							}
							content += "</strong>"
							skillContainer.innerHTML = content;
						}
					})
			} else {
				throw new Error("Terjadi kesalahan pada server");
			}
		})
		.catch(function(error) {
			alert(error.message)
		});
</script>
<?php require $app['template'] . 'admin/footer.php' ?>