function getJob() {
	const dataBody = document.getElementById("data-body");
	fetch(`${baseUrl}/src/api/admin/job/get.php`, {
		method: "GET",
	})
		.then(function (response) {
			return response.json();
		})
		.then(function (response) {
			let contentData = "";

			if(response.data.length === 0) {
				contentData = "<td colspan='4'><strong>Tidak ada data</strong></td>";
				dataBody.innerHTML = contentData;
			}else {
				response.data.forEach((data) => {
					contentData += /*html*/ `
					<tr>
						<td>
							<a href='${data.thumbnail}' target='_blank' class='button-thumbnail'>
								Lihat thumbnail
							</a>
						</td>
						<td>${data.job_payment}</td>
						<td>${data.job_due_date}</td>
						<td style='padding: 15px'>
							<a class='info-button' href='${baseUrl}/src/view/admin/job/detail.php?id=${data.id}'>Detail</a>
							<a class='warning-button' style='margin-left: 10px;' href='${baseUrl}/src/view/admin/job/update.php?id=${data.id}'>Ubah</a>
							<a class='danger-button delete-button' style='margin-left: 10px;' href='javascript:void(0)' onclick='deleteJob("${data.id}")'>Hapus</a>
						</td>
					</tr>
				`;
				});
				dataBody.innerHTML = contentData;
			}
		});
}

function getDetailJob(id) {
	return fetch(`${baseUrl}/src/api/admin/job/get.php?id=${id}`, {
		method: "GET",
	})
	.then(function (response) {
		return response.json();
	})
}

function postJob(formData) {
	fetch(`http://localhost/findart/src/api/admin/job/post.php`, {
		method: "POST",
		body: formData,
	})
		.then(function (response) {
			console.log(response);
			return response.json();
		})
		.then(function (response) {
			if (response.code > 200) {
				throw new Error(response.message);
			}

			alert(response.message);
			window.location.href = baseUrl + "/src/view/admin/";
		})
		.catch(function (err) {
			alert(err);
		});
}

function updateJob(formData) {
	fetch(`${baseUrl}/src/api/admin/job/update.php`, {
		method: "POST",
		body: formData,
	})
		.then(function (response) {
			return response.json();
		})
		.then(function (response) {
			if (response.code > 200) {
				throw new Error(response.message);
			}

			alert(response.message);
			window.location.href = baseUrl + "/src/view/admin/";
		})
		.catch(function (err) {
			alert(err);
		});
}

function deleteJob(jobId) {
	const willDeleted = confirm("Yakin ingin menghapusnya?");

	if (willDeleted) {
		const formData = new FormData();
		formData.append("id", jobId);

		fetch(`${baseUrl}/src/api/admin/job/delete.php`, {
			method: "POST",
			body: formData,
		})
			.then(function (response) {
				return response.json();
			})
			.then(function (response) {
				if (response.code > 200) {
					throw new Error(response.message);
				}
	
				alert(response.message);
				getJob();
			})
			.catch(function (err) {
				alert(err);
			});
	}
}

function getInterestedART(jobId) {
	return fetch(`${baseUrl}/src/api/admin/job/detail.php?id=${jobId}`, {
		method: 'GET'
	})
	.then(function (response) {
		return response.json();
	});
}

function getMyART() {
	return fetch(`${baseUrl}/src/api/admin/art/get.php`, {
		method: "GET",
	}).then(function (response) {
		return response.json();
	});
}

function getDetailART(artId) {
	return fetch(`${baseUrl}/src/api/art/detail-art.php?id=${artId}`, {
		method: 'GET',
	})
	.then(function (response) {
		return response.json();
	})
}

function getSkillART(artId) {
	return fetch(`${baseUrl}/src/api/art/skill-art.php?id=${artId}`, {
		method: 'GET',
	})
	.then(function (response) {
		return response.json();
	})
}

function chooseART(formData) {
	return fetch(`${baseUrl}/src/api/admin/job/select-art.php`, {
		method: "POST",
		body: formData
	}).then(function (response) {
		return response.json();
	});
}