const formSetting = document.getElementById('form-setting');
const changePasswordBtn = document.getElementById('btn-change-password');
const provinsiField = document.getElementById('provinsi');
const kotaField = document.getElementById('kota');
const kecamatanField = document.getElementById('kecamatan');
const kelurahanField = document.getElementById('kelurahan');
const addressField = document.getElementById('address');

window.addEventListener('load', function () {
	getProvinsi();
	getKota();
	getKecamatan();
	getKelurahan();

	provinsiField.addEventListener('change', function () {
		fetch(
			`${baseUrl}/src/api/location/getCity.php?province_id=` +
				provinsiField.value,
			{
				method: 'GET',
			}
		)
			.then(function (response) {
				return response.json();
			})
			.then(function (response) {
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
			});
	});

	kotaField.addEventListener('change', function () {
		fetch(
			`${baseUrl}/src/api/location/getDistrict.php?city_id=` + kotaField.value,
			{
				method: 'GET',
			}
		)
			.then(function (response) {
				return response.json();
			})
			.then(function (response) {
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
			});
	});

	kecamatanField.addEventListener('change', function () {
		fetch(
			`${baseUrl}/src/api/location/getSubDistrict.php?district_id=` +
				kecamatanField.value,
			{
				method: 'GET',
			}
		)
			.then(function (response) {
				return response.json();
			})
			.then(function (response) {
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
			});
	});

	formSetting.addEventListener('submit', function (e) {
		e.preventDefault();
		
		const formData = new FormData(this);

		fetch(`${baseUrl}/src/api/art/settings/change-settings.php`, {
			method: 'POST',
			body: formData
		})
			.then(function (response) {
				return response.json();
			})
			.then(function (response) {
				if (response.code > 200) {
					throw new Error(response.message);
				}
				alert('Berhasil mengubah setting');
				window.location.reload();
			})
			.catch(function (err) {
				alert(err.message);
			})
	});

	changePasswordBtn.addEventListener('click', function () {
		window.location.href = `${baseUrl}/src/view/art/settings/change-password.php`;
	});
});
