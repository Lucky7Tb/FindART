<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'art/header.php';
?>

<div class="container">

	<?php require $app['template'] . 'art/navbar.php' ?>

	<div id="main">
		<div class="row">
			<div class="col-12">
				<table>
					<thead>
						<tr>
							<th>Pencari ART</th>
							<th>Gaji</th>
							<th>Tgl berakhir lowongan</th>
							<th>Tgl perubahan</th>
							<th>Status pekerjaan</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody id="data-body" style="text-align: center;"></tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'art/job/my-job.js' ?>"></script>
<script>
	getMyJob();
</script>
<?php require $app['template'] . 'art/footer.php' ?>