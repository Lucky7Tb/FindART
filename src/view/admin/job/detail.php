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
	getInterestedART(<?= $_GET['id'] ?>)
		.then(function(response) {
			const artContainer = document.getElementById('art-container');
			let content = "";

			if (response.data.length === 0) {
				artContainer.innerHTML = `<h2 class='text-center' style='margin-top: 3em'>Belum ada ART yang tertarik</h2>`;
			} else {
				content += `<h2 class="text-center" style="margin-top: 3em"> ART yang tertarik </h2>`;
				response.data.forEach(art => {
					if (art.art_rating !== null) {
						const artRating = parseInt(art.art_rating);
						let starRating = "<div style='text-align: center'>";
						for (let i = 0; i < artRating; i++) {
							starRating += `
								<img src="${baseUrl}/src/assets/img/icon/star.svg" alt="rating star" width="7%">
							`;
						}
						starRating += "</div>"
						content += `
							<div class="col-4">
								<div class="card">
									<h3 class="text-center">${art.art_name}</h3>
									<a href="${baseUrl}/src/view/admin/job/detail-art.php?id=${art.art_id}">
										<img src="${art.art_photo}" class="d-block mx-auto" alt="Avatar" width="25%">
									</a>
									<h4 class="text-center">Rating: </h4>
									${starRating}
									<div style="margin-left: 40%; margin-top: 1.5em">
										<button class="primary-button" onclick='selectART(${art.art_id})'>Pilih ART</button>
									</div>
								</div>
							</div>
						`;
					} else {
						content += `
							<div class="col-4">
								<div class="card">
									<h3 class="text-center">${art.art_name}</h3>
									<a href="${baseUrl}/src/view/admin/job/detail-art.php?id=${art.art_id}">
										<img src="${art.art_photo}" class="d-block mx-auto" alt="Avatar" width="25%">
									</a>								
									<h4 class="text-center">Rating: </h4>
									<h4 class="text-center">Belum ada rating</h4>
									<div style="margin-left: 40%; margin-top: 1.5em">
										<button data-art-id='${art.art_id}' class="primary-button" onclick='selectART(${art.art_id})'>Pilih ART</button>
									</div>
								</div>
							</div>
						`;
					}
				});

				artContainer.innerHTML = content;
			}
		});

		function selectART(artId) {
			const willSelected = confirm("Yakin ingin memilih ART ini?");
			if (willSelected) {
				const formData = new FormData;
				formData.append('art_id', artId);
				formData.append('job_id', <?= $_GET['id'] ?>);
				chooseART(formData)
					.then(function (response) {
						if (response.code > 200) {
							throw new Error(response.message);
						}

						window.location.href = `${baseUrl}/src/view/admin/`
					})
					.catch(function (err) {
						alert(err.message);
					})
			}
		}
</script>
<?php require $app['template'] . 'admin/footer.php' ?>