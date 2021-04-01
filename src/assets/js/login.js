const username = document.getElementById('username');
const password = document.getElementById('password');
const formLogin = document.getElementById('form-login');

formLogin.addEventListener('submit', function(e) {
  e.preventDefault();

  const data = new FormData();

  data.append("username", username.value);
  data.append("password", password.value);

  fetch("http://localhost/findart/src/api/auth/login.php", {
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

      switch (response.data.role) {
        case "0":
          window.location.href = "http://localhost/findart/src/view/admin/index.php";
          break;
        case "1":
          window.location.href = "http://localhost/findart/src/view/art/index.php";
          break;
      }
    })
    .catch(function (error) {
      alert(error);
    })
})