<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'admin/header.php';
?>

<?php require $app['template'] . 'admin/navbar.php'; ?>

<div class="container mt-2 mb-5">
	
	<div class="row">
		<div class="col-12">
			<img src="<?= $_SESSION['user']['photo'] ?>" class="img-fluid d-block mx-auto" alt="Avatar" width="10%">

			<form method="post" id="form-setting">
				<div class="form-group mt-2">
					<label for="profile_photo">Foto profile</label>
					<input type="file" name="profile_photo" class="form-control" id="profile_photo">
				</div>

				<div class="form-group mt-2">
					<label for="contact">No telpon</label>
					<input type="text" name="contact"  class="form-control" id="contact" placeholder="Isi no telpon anda" value="<?= $_SESSION['user']['contact_number'] ?>"> 
				</div>

				<div class="form-group mt-2">
					<label for="provinsi">Provinsi</label>
					<select type="text" name="provinsi" class="form-select" id="provinsi" required></select>
				</div>

				<div class="form-group mt-2">
					<label for="kota">Kota</label>
					<select type="text" name="kota" class="form-select" id="kota" required></select>
				</div>

				<div class="form-group mt-2">
					<label for="kecamatan">Kecamatan</label>
					<select type="text" name="kecamatan" class="form-select" id="kecamatan" required></select>
				</div>

				<div class="form-group mt-2">
					<label for="kelurahan">Kelurahan</label>
					<select type="text" name="kelurahan" class="form-select" id="kelurahan" required></select>
				</div>

				<div class="form-group mt-2">
					<label for="address">Alamat</label>
					<textarea name="address" class="form-control" id="address" cols="100" rows="10" placeholder="Isi alamat lengkap anda" required><?= $_SESSION['user']['address'] ?></textarea>
				</div>

				<button type="submit" class="btn btn-primary mt-3 mb-5">Simpan</button>
				<button type="button" class="btn btn-warning mt-3 mb-5" id="btn-change-password">Ubah password</button>
			</form>
		</div>
	</div>
</div>

<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'admin/settings/setting.js' ?>"></script>
<script>
	function getProvinsi() {
		fetch(`${baseUrl}/src/api/location/getProvince.php`, {
				method: 'GET',
			})
			.then(function(response) {
				return response.json();
			})
			.then(function(response) {
				if (response.code > 200) {
					throw new Error(response.message);
				}

				let content = '';
				response.data.forEach((data) => {
					content += `
						<option value="${data.id}">${data.name}</option>
        	`;
				});
				provinsiField.innerHTML = content;
				provinsiField.value = <?= $_SESSION['user']['province_id'] ?>
			});
	}

	function getKota() {
		fetch(`${baseUrl}/src/api/location/getCity.php?province_id=<?= $_SESSION['user']['province_id'] ?>`, {
				method: 'GET',
			})
			.then(function(response) {
				return response.json();
			})
			.then(function(response) {
				if (response.code > 200) {
					throw new Error(response.message);
				}

				let content = '';
				response.data.forEach((data) => {
					content += `
						<option value="${data.id}">${data.name}</option>
        	`;
				});
				kotaField.innerHTML = content;
				kotaField.value = <?= $_SESSION['user']['city_id'] ?>
			});
	}

	function getKecamatan() {
		fetch(`${baseUrl}/src/api/location/getDistrict.php?city_id=<?= $_SESSION['user']['city_id'] ?>`, {
				method: 'GET',
			})
			.then(function(response) {
				return response.json();
			})
			.then(function(response) {
				if (response.code > 200) {
					throw new Error(response.message);
				}

				let content = '';
				response.data.forEach((data) => {
					content += `
						<option value="${data.id}">${data.name}</option>
        	`;
				});
				kecamatanField.innerHTML = content;
				kecamatanField.value = <?= $_SESSION['user']['district_id'] ?>
			});
	}

	function getKelurahan(params) {
		fetch(`${baseUrl}/src/api/location/getSubDistrict.php?district_id=<?= $_SESSION['user']['district_id'] ?>`, {
				method: 'GET',
			})
			.then(function(response) {
				return response.json();
			})
			.then(function(response) {
				if (response.code > 200) {
					throw new Error(response.message);
				}

				let content = '';
				response.data.forEach((data) => {
					content += `
						<option value="${data.id}">${data.name}</option>
        	`;
				});
				kelurahanField.innerHTML = content;
				kelurahanField.value = <?= $_SESSION['user']['sub_district_id'] ?>
			});
	}
</script>
<?php require $app['template'] . 'admin/footer.php' ?>