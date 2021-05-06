<div class="header">
	<img src="<?= $app['src']['image'] . 'findart_logo_2.png' ?>" alt="logo.png" width="25%">
</div>
<div class="navbar">
	<li><a href="index.php">Cari Kerja</a></li>
	<li><a href="my-job.php">Daftar Pekerjaanku</a></li>
	<li><a href="">Pengaturan</a></li>
	<li><a href="javascript:void(0)" id="logout-button"><?= $_SESSION['user']['username'] ?>(Logout)</a></li>
</div>