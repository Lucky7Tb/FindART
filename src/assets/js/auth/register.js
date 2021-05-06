const nama = document.getElementById('nama');
const alamat = document.getElementById('alamat');
const provinsi = document.getElementById('provinsi');
const kota = document.getElementById('kota');
const kecamatan = document.getElementById('kecamatan');
const kelurahan = document.getElementById('kelurahan');
const telepon = document.getElementById('telepon');
const username = document.getElementById('username');
const password = document.getElementById('password');
const artSkill = document.getElementById('art_skill');
const confirmPassword = document.getElementById('con-password');
const role = document.getElementById('mendaftar');
const formRegister = document.getElementById('form-register');

getProvinsi();

function getProvinsi() {
  fetch(`${baseUrl}/src/api/location/getProvince.php`, {
		method: 'GET',
	})
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
			provinsi.innerHTML = content;
		});
}

provinsi.addEventListener("change", function () {
  fetch(`${baseUrl}/src/api/location/getCity.php?province_id=` + provinsi.value, {
    method: "GET",
  })
    .then(function (response) {
      return response.json();
    })
    .then (function (response) {
      if (response.code > 200) {
        throw new Error(response.message);
      }

      let content = "";
      response.data.forEach(data => {
        content += `
          <option value="${data.id}">${data.name}</option>
        `
      });
      kota.innerHTML = content;
    })
})

kota.addEventListener("change", function () {
  fetch(`${baseUrl}/src/api/location/getDistrict.php?city_id=` + kota.value, {
		method: 'GET',
	})
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
			kecamatan.innerHTML = content;
		});
})

kecamatan.addEventListener("change", function () {
  fetch(`${baseUrl}/src/api/location/getSubDistrict.php?district_id=` + kecamatan.value, {
    method: "GET",
  })
    .then(function (response) {
      return response.json();
    })
    .then (function (response) {
      if (response.code > 200) {
        throw new Error(response.message);
      }

      let content = "";
      response.data.forEach(data => {
        content += `
          <option value="${data.id}">${data.name}</option>
        `
      });
      kelurahan.innerHTML = content;
    })
})

formRegister.addEventListener('submit', function(e) {
  e.preventDefault();

  const data = new FormData();

	let skill = [...artSkill.options];
	skill = skill
	.filter(option => option.selected)
	.map(option => option.value);

  data.append("is_art", role.value);
  data.append("province_id", provinsi.value);
  data.append("city_id", kota.value);
  data.append("district_id", kecamatan.value);
  data.append("sub_district_id", kelurahan.value);
  data.append("username", username.value);
  data.append("password", password.value);
  data.append("confirm_password", confirmPassword.value);
  data.append("contact_number", telepon.value);
  data.append("address", alamat.value);
  data.append("full_name", nama.value);
  data.append("art_skill", skill);

  fetch(`${baseUrl}/src/api/auth/register.php`, {
		method: 'POST',
		body: data,
	})
		.then(function (response) {
			return response.json();
		})
		.then(function (response) {
			if (response.code > 200) {
				throw new Error(response.message);
			}

			window.location.href = 'login.php';
		})
		.catch(function (error) {
			alert(error);
		});
})

function toggleSkill(form) {
	if (form.value === "0") {
		document.getElementById('art_skill_container').style.display = 'none';
	} else {
		document.getElementById('art_skill_container').style.display = 'block';
	}
}