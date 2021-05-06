const baseUrl = "http://localhost/findart";

window.addEventListener("load", function () {
	const logoutButton = document.getElementById("logout-button");

	if (logoutButton) {
		logoutButton.addEventListener("click", function () {
			fetch(`${baseUrl}/src/api/auth/logout.php`, {
				method: "GET",
			})
				.then(function (response) {
					return response.json();
				})
				.then(function (response) {
					if (response.code === 200) {
						window.location.href = baseUrl;
					}
				});
		});
	}
});
