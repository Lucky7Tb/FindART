<?php
require __DIR__ . '/../../config/app.php';
require __DIR__ . '/../../helpers/helpers.php';
$app = config();
require $app['template'] . 'admin/header.php';
?>

<?php require $app['template'] . 'admin/navbar.php'; ?>


<div class="container">

	<div class="row">
		<div class="col-12" style="margin-top: 2em;">
			<a href="./job/create-job.php" class="btn btn-primary">
				<img src="<?= $app['src']['image'] . 'icon/plus.svg' ?>" alt="plus">
				Tambah lowongan
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hovered text-center caption-top mt-3">
					<caption>Daftar lowongan anda</caption>
					<thead>
						<tr>
							<th>Thumbnail</th>
							<th>Gaji</th>
							<th>Tgl berakhir lowongan</th>
							<th>Tgl perubahan</th>
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
<script src="<?= $app['src']['js'] . 'admin/job/job.js' ?>"></script>
<script>
	getJob();
</script>
<?php require $app['template'] . 'admin/footer.php' ?>