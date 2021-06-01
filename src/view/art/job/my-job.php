<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'art/header.php';
?>

<?php require $app['template'] . 'art/navbar.php' ?>

<div class="container mt-2 mb-5">
	<div class="row">
		<div class="col-12">
			<div class="form-group mt-2">
				<label for="job-status">Status pekerjaan</label>
				<select name="job-status" id="job-status" class="form-select" onchange="getMyJob()">
					<option value="4" selected>Semua</option>
					<option value="0">Pending</option>
					<option value="1">Ditolak</option>
					<option value="2">Diterima</option>
					<option value="3">Sudah berhenti</option>
				</select>
			</div>
			<div class="table-responsive mt-2">
				<table class="table caption-top table-bordered table-hovered text-center">
					<caption>Daftar Pekerjaan</caption>
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