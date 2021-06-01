const provinsi = document.getElementById('provinsi');
const kota = document.getElementById('kota');
const formCari = document.getElementById('form-cari');
const buttonResetSearch = document.getElementById('reset-search');

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

provinsi.addEventListener('change', function () {
	fetch(
		`${baseUrl}/src/api/location/getCity.php?province_id=` + provinsi.value,
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
			kota.innerHTML = content;
		});
});

function getJob() {
	const dataLowongan = document.getElementById('data-lowongan');

	fetch('http://localhost/findart/src/api/art/job/get-list-job.php', {
		method: 'GET',
	})
		.then(function (response) {
			return response.json();
		})
		.then(function (response) {
			let contentData = '';

			response.data.forEach((data) => {
				contentData += `
					<div class="col">
						<div class="card mb-3 h-100">
							<div class="row g-0">
								<div class="col-md-4">
									<img class="img-fluid" src="${data.thumbnail}" alt="thumbnail.jpg">
								</div>
								<div class="col-md-8">
									<div class="card-body">
										<h2 class="card-title mb-3 mt-3">Rp. ${data.job_payment} /bulan</h2>
										<h5 class="card-text text-primary mb-3">${data.finder}</h5>
										<h5 class="card-text">${data.province}, ${data.city}</h5>
										<a class="btn btn-primary" href="${baseUrl}/src/view/art/job/job-detail.php?id=${data.id}">Detail</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				`;
			});
			dataLowongan.innerHTML = contentData;
		});
}

formCari.addEventListener('submit', function (e) {
	e.preventDefault();

	const dataLowongan = document.getElementById('data-lowongan');

	fetch(
		`${baseUrl}/src/api/art/job/get-list-job.php?provinsi=${provinsi.value}&kota=${kota.value}`,
		{
			method: 'GET',
		}
	)
		.then(function (response) {
			return response.json();
		})
		.then(function (response) {
			let contentData = '';

			if (response.data) {
				response.data.forEach((data) => {
					contentData += `
						<div class="col">
							<div class="card mb-3 h-100">
								<div class="row g-0">
									<div class="col-md-4">
										<img class="img-fluid" src="${data.thumbnail}" alt="thumbnail.jpg">
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h2 class="card-title mb-3 mt-3">Rp. ${data.job_payment} /bulan</h2>
											<h5 class="card-text text-primary mb-3">${data.finder}</h5>
											<h5 class="card-text">${data.province}, ${data.city}</h5>
											<a class="btn btn-primary" href="${baseUrl}/src/view/art/job/job-detail.php?id=${data.id}">Detail</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					`;
				});
			} else {
				contentData += `
					<div class="row">
						<div class="col-12">
							<h1 class="text-center">Lowongan tidak ditemukan</h1>
						</div>
					</div>
				`;
			}

			dataLowongan.innerHTML = contentData;
		});
});

buttonResetSearch.addEventListener('click', function () {
	getJob();
});
