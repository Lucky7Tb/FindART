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
					let number = art.art_number.split('');
					number[0] = '62';
					number = number.join('');
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
								<div style='text-align:center; margin-top: 1.5em'>
										<a class='primary-button' href="https://api.whatsapp.com/send?phone=${number}&text=Halo%20saudara/i%20${art.art_name}%20sekarang%20anda%20bekerja%20dengan%20saya%20ya.%20Mohon%20kerjasamanya.">Chat</a>
								</div>
								<div style="text-align:center; margin-top: 1.5em">
									<a class="danger-button" href='${baseUrl}/src/view/admin/art/rating-art.php?art_id=${art.art_id}&id=${art.id}' onclick="return confirm('Yakin ingin memberhentikan ART ini?')">Berhentikan</a>
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