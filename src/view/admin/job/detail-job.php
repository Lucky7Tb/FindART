<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'admin/header.php';
?>

<?php require $app['template'] . 'admin/navbar.php'; ?>

<div class="container mb-5">

	<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 mt-3" id="art-container"></div>

</div>

<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'admin/job/job.js' ?>"></script>
<script>
	getInterestedART(<?= $_GET['id'] ?>);

	function confirmSelectART(artId) {
		const willSelected = confirm("Yakin ingin memilih ART ini?");
		if (willSelected) {
			const formData = new FormData;
			formData.append('art_id', artId);
			formData.append('job_id', <?= $_GET['id'] ?>);
			chooseART(formData);
		}
	}
</script>
<?php require $app['template'] . 'admin/footer.php' ?>