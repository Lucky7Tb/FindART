<?php 
	require __DIR__.'/../../config/app.php';
	$app = config();
	require $app['template'].'header.php';
?>




<script src="<?= $app['src']['js'].'http.js' ?>"></script>
<?php require $app['template'].'header.php' ?>