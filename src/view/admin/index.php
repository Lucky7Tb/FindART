<?php
require __DIR__ . '/../../config/app.php';
$app = config();
require $app['template'] . 'header.php';
?>

<h1>ART Finde</h1>



<script src="<?= $app['src']['js'] . 'http.js' ?>"></script>
<?php require $app['template'] . 'header.php' ?>