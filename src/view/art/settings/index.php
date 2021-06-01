<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'art/header.php';
?>

<?php require $app['template'] . 'art/navbar.php'; ?>
<div class="container mt-2 mb-5">

	<div class="row">
		<div class="col-12">
			<img src="<?= $_SESSION['user']['photo'] ?>" class="d-block mx-auto" alt="Avatar" width="10%">
			<h3 class="text-center" style="margin-top: 1em">
				<?php if ($_SESSION['user']['job_status'] == '1'): ?>
					Status: <span style="color: var(--primary-color)">Bekerja :)</span>
				<?php else: ?>
					Status: <span style="color: var(--warning-color)">Tidak bekerja :(</span>
				<?php endif ?>
			</h3>
			<form id="form-setting">
				<div class="form-group">
					<label for="profile_photo">Foto profile</label>
					<input class="form-control" type="file" name="profile_photo" id="profile_photo">
				</div>

				<div class="form-group mt-2">
					<label for="address">Deskripsi anda</label>
					<textarea class="form-control" name="description" id="description" cols="100" rows="10" placeholder="Isi deskripsi tentang diri anda sendiri" required><?= $_SESSION['user']['art_description'] ?></textarea>
				</div>

				<div class="form-group mt-2">
					<label for="contact">No telpon</label>
					<input class="form-control" type="text" name="contact" id="contact" placeholder="Isi no telpon anda" value="<?= $_SESSION['user']['contact_number'] ?>">
				</div>

				<div class="form-group mt-2">
					<label for="provinsi">Provinsi</label>
					<select class="form-select" type="text" name="provinsi" id="provinsi" required></select>
				</div>

				<div class="form-group mt-2">
					<label for="kota">Kota</label>
					<select class="form-select" type="text" name="kota" id="kota" required></select>
				</div>

				<div class="form-group mt-2">
					<label for="kecamatan">Kecamatan</label>
					<select class="form-select" type="text" name="kecamatan" id="kecamatan" required></select>
				</div>

				<div class="form-group mt-2">
					<label for="kelurahan">Kelurahan</label>
					<select class="form-select" type="text" name="kelurahan" id="kelurahan" required></select>
				</div>

				<div class="form-group mt-2">
					<label for="address">Alamat</label>
					<textarea class="form-control" name="address" id="address" cols="100" rows="10" placeholder="Isi alamat lengkap tempat anda tinggal" required><?= $_SESSION['user']['address'] ?></textarea>
				</div>

				
					<button type="submit" class="btn btn-primary mt-3 mb-5">Simpan</button>
				
					<button type="button" class="btn btn-warning mt-3 mb-5" id="btn-change-password">Ubah password</button>
				
			</form>
		</div>
	</div>

</div>

<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'art/settings/setting.js' ?>"></script>
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
<?php require $app['template'] . 'art/footer.php' ?>