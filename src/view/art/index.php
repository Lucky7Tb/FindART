<?php
require __DIR__ . '/../../config/app.php';
require __DIR__ . '/../../helpers/helpers.php';
$app = config();
require $app['template'] . 'art/header.php';
?>

<?php require $app['template'] . 'art/navbar.php' ?>


<div class="container mt-2 mb-5">
	<form id="form-cari">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-5 col-lg-5 mt-3 mb-4">
				<div class="form-group">
					<select class="form-select" name="provinsi" id="provinsi" placeholder="Provinsi">
						<option value="" disabled selected hidden>Provinsi</option>
					</select>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-5 col-lg-5 mt-3">
				<div class="form-group">
					<select class="form-select" name="kota" id="kota">
						<option value="" disabled selected hidden>Kota</option>
					</select>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-2 col-lg-2 mt-3">
				<button type="submit" id="cari" class="btn btn-primary mt">Cari</button>
				<button type="button" id="reset-search" class="btn btn-primary mt">Reset</button>
			</div>
		</div>
	</form>

	<div id="data-lowongan" class="mt-2 row row-cols-1 g-4"></div>

</div>

<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'art/job/job.js' ?>"></script>
<script>
	getJob();
</script>
<?php require $app['template'] . 'art/footer.php' ?>