const nama = document.getElementById('nama');
const alamat = document.getElementById('alamat');
const provinsi = document.getElementById('provinsi');
const kota = document.getElementById('kota');
const kecamatan = document.getElementById('kecamatan');
const kelurahan = document.getElementById('kelurahan');
const telepon = document.getElementById('telepon');
const username = document.getElementById('username');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('con-password');
const role = document.getElementById('mendaftar');
const formRegister = document.getElementById('form-register');

formRegister.addEventListener('submit', function(e) {

  const data = new FormData();

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

  fetch("http://localhost/findart/src/api/auth/register.php", {
    method: "POST",
    body: data,
  })
    .then(function (response) {
      return response.json();
    })
    .then(function (response) {
      if (response.code > 200) {
        throw new Error(response.message);
      }

      console.log(response);
    })
    .catch(function (error) {
      alert(error);
    })
})