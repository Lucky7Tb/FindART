<div class="header">
	<img src="<?= $app['src']['image'] . 'findart_logo_2.png' ?>" alt="logo.png" width="25%">
</div>
<div class="navbar">
	<li><a href="<?= BASEURL.'/src/view/art' ?>">Cari Kerja</a></li>
	<li><a href="<?= BASEURL.'/src/view/art/job/my-job.php' ?>">Daftar Pekerjaanku</a></li>
	<li><a href="<?= BASEURL.'/src/view/art/settings' ?>">Pengaturan</a></li>
	<li><a href="javascript:void(0)" id="logout-button"><?= $_SESSION['user']['username'] ?>(Logout)</a></li>
</div>