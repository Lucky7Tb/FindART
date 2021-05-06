function getDetail(id) {
	return fetch(`http://localhost/findart/src/api/art/job/detail-job.php?id=${id}`, {
		method: 'GET',
	}).then(function (response) {
		return response.json();
	});
}