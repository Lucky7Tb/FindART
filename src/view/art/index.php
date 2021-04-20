<?php 
	require __DIR__.'/../../config/app.php';
	require __DIR__ . '/../../helpers/helpers.php';
	$app = config();
	require $app['template'].'art/header.php';
?>

  <div class="container">

		<?php require $app['template'].'art/navbar.php'?>

    <form action="">
      <select name="provinsi" id="provinsi" placeholder="Provinsi">
        <option value="" disabled selected hidden>Provinsi</option>
      </select>
      <select name="kota" id="kota">
        <option value="" disabled selected hidden>Kota</option>
      </select>
      <input type="submit" name="cari" id="cari" value="Cari">
    </form>

    <div id="data-lowongan">
      
    </div>

    </div>
    

	<script src="<?= $app['src']['js'].'app.js' ?>"></script>
  <script src="<?= $app['src']['js'].'art/menu.js' ?>"></script>
<?php require $app['template'].'art/footer.php' ?>