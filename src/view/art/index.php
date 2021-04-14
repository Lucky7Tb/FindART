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

    <div class="card">
      <div class="left">
        <img src="../../assets/img/contoh.png" alt="gambar.png">
        <p class="card-header">Rp 1.800.000 </p><p style="padding: 15px;">/bulan</p>
        <p class="user">Ibu Ratna</p>
        <p style="padding: 0 0 15px 0;">Dicari Asisten Rumah Tangga (ART)</p>
        <p class="location">Bandung, Jawa Barat</p>
      </div>
      <a class="link" href="detail.php">Detail</a>
    </div>
    <div class="card">
      <div class="left">
        <img src="../../assets/img/contoh.png" alt="gambar.png">
        <p class="card-header">Rp 1.800.000 </p><p style="padding: 15px;">/bulan</p>
        <p class="user">Ibu Ratna</p>
        <p style="padding: 0 0 15px 0;">Dicari Asisten Rumah Tangga (ART)</p>
        <p class="location">Bandung, Jawa Barat</p>
      </div>
      <a class="link" href="detail.php">Detail</a>
    </div>
    <div class="card">
      <div class="left">
        <img src="../../assets/img/contoh.png" alt="gambar.png">
        <p class="card-header">Rp 1.800.000 </p><p style="padding: 15px;">/bulan</p>
        <p class="user">Ibu Ratna</p>
        <p style="padding: 0 0 15px 0;">Dicari Asisten Rumah Tangga (ART)</p>
        <p class="location">Bandung, Jawa Barat</p>
      </div>
      <a class="link" href="detail.php">Detail</a>
    </div>
  </div>

	<script src="<?= $app['src']['js'].'app.js' ?>"></script>
<?php require $app['template'].'art/footer.php' ?>