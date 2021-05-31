<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fdfdfd">
  <div class="container">
    <a class="navbar-brand" href="#">	
			<img src="<?= $app['src']['image'] . 'findart_logo_2.png' ?>" alt="logo.png" width="50%">
		</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
        	<a class="nav-link" href="<?= BASEURL . "/src/view/admin" ?>">Lowonganku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL . "/src/view/admin/art" ?>">ART ku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL . "/src/view/admin/settings" ?>">Pengaturan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)" id="logout-button"><?= $_SESSION['user']['username'] ?>(Logout)</a>
        </li>
      </ul>
    </div>
  </div>
</nav>