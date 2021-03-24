const http = {
	get: function(url) {
		return fetch(url, {
			method: "GET",
			headers: {
				Accept: "application/json",
			},
		})
			.then((response) => response.json())
	},
	post: function(url, formData) {
		return fetch(url, {
			method: "POST",
			headers: {
				Accept: "application/json",
			},
			body: formData,
		})
			.then((response) => response.json())
	}
}