<?php
require __DIR__ . '/../../config/app.php';
require __DIR__ . '/../../helpers/helpers.php';
$app = config();
require $app['template'] . 'admin/header.php';
?>

<div class="container">
	<?php require $app['template'] . 'admin/navbar.php'; ?>
	
	<div class="col-12">
		<a href="./job/create.php" class="primary-button">
			<img src="<?= $app['src']['image'] . 'icon/plus.svg' ?>" alt="plus">
			Tambah lowongan
		</a>
	</div>

	<div class="row">
		<div class="col-12">
			<table>
				<thead>
					<tr>
						<th>Thumbnail</th>
						<th>Gaji</th>
						<th>Tanggal berakhir</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<tbody id="data-body" style="text-align: center;"></tbody>
			</table>
		</div>
	</div>
</div>

<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'admin/job.js' ?>"></script>
<script>
	getJob();
</script>
<?php require $app['template'] . 'admin/footer.php' ?>