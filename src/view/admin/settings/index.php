<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'admin/header.php';
?>

<div class="container">
	<?php require $app['template'] . 'admin/navbar.php'; ?>

	<div class="row">
		<div class="col-12">
			<img src="<?= $_SESSION['user']['photo'] ?>" class="d-block mx-auto" alt="Avatar" width="10%">

			<form id="form-setting">
				<div class="file-upload col-12">
					<label for="profile_photo">Foto profile</label>
					<input type="file" name="profile_photo" id="profile_photo">
				</div>

				<div class="inner-form col-12">
					<label for="contact">No telpon</label>
					<input type="text" name="contact" id="contact" value="<?= $_SESSION['user']['contact_number'] ?>">
				</div>

				<div class="inner-form col-12">
					<label for="provinsi">Provinsi</label>
					<select type="text" name="provinsi" id="provinsi" required></select>
				</div>

				<div class="inner-form col-12">
					<label for="kota">Kota</label>
					<select type="text" name="kota" id="kota" required></select>
				</div>

				<div class="inner-form col-12">
					<label for="kecamatan">Kecamatan</label>
					<select type="text" name="kecamatan" id="kecamatan" required></select>
				</div>

				<div class="inner-form col-12">
					<label for="kelurahan">Kelurahan</label>
					<select type="text" name="kelurahan" id="kelurahan" required></select>
				</div>

				<div class="inner-form col-12">
					<label for="address">Alamat</label>
					<textarea name="address" id="address" cols="100" rows="10" required><?= $_SESSION['user']['address'] ?></textarea>
				</div>

				<div class="col-1">
					<button type="submit" class="primary-button-lg">Simpan</button>
				</div>
				<div class="col-1">
					<button type="button" class="warning-button-lg" id="btn-change-password">Ubah password</button>
				</div>
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