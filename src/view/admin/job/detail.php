<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'admin/header.php';
?>

<div class="container">
	<?php require $app['template'] . 'admin/navbar.php'; ?>

	<h2 class="text-center">ART yang tertarik</h2>

	<div class="row" id="art-container"></div>

</div>

<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'admin/job.js' ?>"></script>
<script>
	getInterestedART(<?= $_GET['id'] ?>)
		.then(function(response) {
			const artContainer = document.getElementById('art-container');
			let content = "";

			response.data.forEach(art => {
				if (art.art_rating !== null) {
					const artRating = parseInt(art.art_rating);
					console.log(artRating);
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
									<button data-art-id='${art.art_id}' class="primary-button">Pilih ART</button>
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
									<button data-art-id='${art.art_id}' class="primary-button">Pilih ART</button>
								</div>
							</div>
						</div>
					`;
				}
			});

			artContainer.innerHTML = content;
		})
</script>
<?php require $app['template'] . 'admin/footer.php' ?>