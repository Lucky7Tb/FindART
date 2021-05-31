<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'admin/header.php';
?>

<?php require $app['template'] . 'admin/navbar.php'; ?>

<div class="container">
	<div id="art-container"></div>
</div>

<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'admin/art/art.js' ?>"></script>
<script>
	getDetailART(<?= $_GET['id'] ?>);
</script>
<?php require $app['template'] . 'admin/footer.php' ?>