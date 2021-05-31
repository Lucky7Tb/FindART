<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'admin/header.php';
?>

<?php require $app['template'] . 'admin/navbar.php'; ?>

<div class="container mt-2">

	<div class="row">
		<div class="col-12">
			<img src="<?= $_SESSION['user']['photo'] ?>" class="d-block mx-auto" alt="Avatar" width="10%">

			<form action="post" id="form-change-password">
				<div class="form-group">
					<label for="new_password">Password baru</label>
					<input type="password" name="new_password" class="form-control" id="new_password" placeholder="Masukan password baru" required>
				</div>

				<div class="form-group mt-2">
					<label for="confirm_password">Konfirmasi password</label>
					<input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Masukan konfirmasi password" required>
				</div>

				<div class="col-1">
					<button type="submit" class="btn btn-primary mt-2">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'admin/settings/change-password.js' ?>"></script>
<?php require $app['template'] . 'admin/footer.php' ?>