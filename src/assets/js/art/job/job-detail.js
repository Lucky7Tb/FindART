function getDetail(id) {
	return fetch(`${baseUrl}/src/api/art/job/detail-job.php?id=${id}`, {
		method: 'GET',
	}).then(function (response) {
		return response.json();
	});
}