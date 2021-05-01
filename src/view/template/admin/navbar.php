<div class="header">
	<img src="<?= $app['src']['image'] . 'findart_logo_2.png' ?>" alt="logo.png">
</div>
<div class="navbar">
	<li><a href="<?= BASEURL . "/src/view/admin" ?>">Lowonganku</a></li>
	<li><a href="<?= BASEURL . "/src/view/admin/art" ?>">ART ku</a></li>
	<li><a href="<?= BASEURL . "/src/view/admin/settings" ?>">Pengaturan</a></li>
	<li><a href="javascript:void(0)" id="logout-button"><?= $_SESSION['user']['username'] ?>(Logout)</a></li>
</div>