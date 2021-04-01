function get(url) {
	return fetch(url, {
		method: "GET",
		headers: {
			Accept: "application/json",
		},
	}).then((response) => response.json());
}

function post(url, formData) {
	return fetch(url, {
		method: "POST",
		headers: {
			Accept: "application/json",
		},
		body: formData,
	})
	.then((response) => response.json());
}