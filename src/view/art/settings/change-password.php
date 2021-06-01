<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'art/header.php';
?>

<?php require $app['template'] . 'art/navbar.php'; ?>
<div class="container">

	<div class="row">
		<div class="col-12">
			<img src="<?= $_SESSION['user']['photo'] ?>" class="d-block mx-auto" alt="Avatar" width="10%">

			<form action="post" id="form-change-password">
				<div class="form-group">
					<label for="new_password">Password baru</label>
					<input class="form-control" type="password" name="new_password" id="new_password" required>
				</div>

				<div class="form-group">
					<label for="confirm_password">Konfirmasi password</label>
					<input class="form-control" type="password" name="confirm_password" id="confirm_password" required>
				</div>

				<div class="col-1">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'art/settings/change-password.js' ?>"></script>
<?php require $app['template'] . 'art/footer.php' ?>