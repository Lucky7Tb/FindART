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
	getMyART()
		.then(function(response) {
			const artContainer = document.getElementById('art-container');
			let content = "";

			if (response.data.length === 0) {
				artContainer.innerHTML = `<h2 class='text-center' style='margin-top: 3em'>Belum ada ART</h2>`;
			} else {
				response.data.forEach(art => {
					content += `
						<div class="col-4">
							<div class="card">
								<h3 class="text-center">${art.art_name}</h3>
								<a href="${baseUrl}/src/view/admin/job/detail-art.php?id=${art.art_id}">
									<img src="${art.art_photo}" class="d-block mx-auto" alt="Avatar" width="25%">
								</a>
								<p class="text-center">
								 <strong>Kontak: ${art.art_number}</strong>			
								</p>		
								<div style="margin-left: 37%; margin-top: 1.5em">
									<button data-art-id='${art.art_id}' class="primary-button">Berhentikan</button>
								</div>
							</div>
						</div>
					`;
				});
				artContainer.innerHTML = content;
			}
		});
</script>
<?php require $app['template'] . 'admin/footer.php' ?>