<?php
require __DIR__ . '/../../config/app.php';
require __DIR__ . '/../../helpers/helpers.php';
$app = config();
require $app['template'] . 'art/header.php';
?>

<div class="container">

	<?php require $app['template'] . 'art/navbar.php'; ?>

	<div id="content">
		
	</div>
	<a class="apply-button" href="javascript:void(0)" onclick='applyJob()'>Apply</a>
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
							</div>
						</div>
						<div class="detail-right">
							<p style="font-weight: 600;">DESKRIPSI</p>
							<div>
								${data.job_description}
							</div>
						</div>
					</div>
					`
			});
			dataContent.innerHTML = content;
		});
	
	function applyJob() {
		const apply = confirm("Ingin mengambil job ini?");

		if(apply) {
			const formData = new FormData();
			formData.append('job_vacancy_id', "<?= $_GET['id'];?>");

			fetch(`${baseUrl}/src/api/art/applyJob.php`, {
				method: "POST",
				body: formData,
			})
			.then(function (response) {
				return response.json();
			})
			.then(function (response) {
				if (response.code > 200) {
					throw new Error(response.message);
				}

				alert(response.message);
				window.location.href = baseUrl + "/src/view/art/";
			})
			.catch(function (err) {
				alert(err);
			});
		}
	}
</script>
<?php require $app['template'] . 'art/footer.php' ?>