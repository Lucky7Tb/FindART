function getMyART() {
	fetch(`${baseUrl}/src/api/admin/art/get-art.php`, {
		method: 'GET',
	})
		.then(function (response) {
			return response.json();
		})
		.then(function (response) {
			const artContainer = document.getElementById('art-container');
			let content = '';

			if (response.data.length === 0) {
				artContainer.innerHTML = `<h2 class='text-center' style='margin-top: 3em'>Belum ada ART</h2>`;
			} else {
				response.data.forEach((art) => {
					let number = art.art_number.split('');
					number[0] = '62';
					number = number.join('');
					content += `
						<div class="col-4">
							<div class="card">
								<h3 class="text-center">${art.art_name}</h3>
								<a href="${baseUrl}/src/view/admin/art/detail-art.php?id=${art.art_id}">
									<img src="${art.art_photo}" class="d-block mx-auto" alt="Avatar" width="25%">
								</a>
								<p class="text-center">
								 <strong>Kontak: ${art.art_number}</strong>			
								</p>		
								<div style='text-align:center; margin-top: 1.5em'>
										<a class='primary-button' href="https://api.whatsapp.com/send?phone=${number}&text=Halo%20saudara/i%20${art.art_name}%20sekarang%20anda%20bekerja%20dengan%20saya%20ya.%20Mohon%20kerjasamanya">Chat</a>
								</div>
								<div style="text-align:center; margin-top: 1.5em">
									<a class="danger-button" href='${baseUrl}/src/view/admin/art/rating-art.php?art_id=${art.art_id}&id=${art.id}' onclick="return confirm('Yakin ingin memberhentikan ART ini?')">Berhentikan</a>
								</div>
							</div>
						</div>
					`;
				});
				artContainer.innerHTML = content;
			}
		});
}

function getDetailART(artId) {
	let content = '';
	fetch(`${baseUrl}/src/api/admin/art/detail-art.php?id=${artId}`, {
		method: 'GET',
	})
		.then(function (response) {
			return response.json();
		})
		.then(function (response) {
			if (response.code === 404) {
				document.getElementById('art-container').innerHTML =
					"<h1 class='text-center'>ART Tidak ditemukan</h1>";
			} else if (response.code === 200) {
				const art = response.data[0];
				const artContainer = document.getElementById('art-container');
				content += `
					<div class="card" style="margin-top: 3em">
						<div class="row">
							<div class="col-12">
								<h1 class="text-center">${art.art_name}</h1>
								<img src="${art.art_photo}" class="d-block mx-auto" alt="Avatar" width="10%">
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<strong>Provinsi: ${art.province}</strong>
							</div>
							<div class="col-12">
								<strong>Kota: ${art.city}</strong>
							</div>
							<div class="col-12">
								<strong>Kecamatan: ${art.district}</strong>
							</div>
							<div class="col-12">
								<strong>Kelurahan: ${art.sub_district}</strong>
							</div>
							<div class="col-12">
								<strong>Alamat: ${art.address}</strong>
							</div>
							<div class="col-12">
								<strong>Deskripsi: ${art.art_description ? art.art_description : '-'}</strong>
							</div>
							<div class="col-12" id="skill-container">
							</div>
						</div>
					</div>
				`;
				artContainer.innerHTML = content;

				getSkillART(artId);
			} else {
				throw new Error('Terjadi kesalahan pada server');
			}
		})
		.catch(function (error) {
			alert(error.message);
		});
}

function getSkillART(artId) {
	fetch(`${baseUrl}/src/api/admin/art/skill-art.php?id=${artId}`, {
		method: 'GET',
	})
		.then(function (response) {
			return response.json();
		})
		.then(function (response) {
			const skillContainer = document.getElementById('skill-container');

			if (response.data.length === 0) {
				skillContainer.innerHTML = '<strong>Skill: - </strong>';
			} else {
				let content = '<strong>Skill: ';
				for (let i = 0; i < response.data.length; i++) {
					if (i == response.data.length - 1) {
						content += response.data[i].art_skill + '.';
					} else {
						content += response.data[i].art_skill + ', ';
					}
				}
				content += '</strong>';
				skillContainer.innerHTML = content;
			}
		});
}

function fireART(formData) {
	fetch(`${baseUrl}/src/api/admin/art/fire-art.php`, {
		method: 'POST',
		body: formData,
	})
	.then(function (response) {
		return response.json();
	})
	.then(function (response) {
		if (response.code == 200) {
			alert('Berhasil memberhentikan art');
			window.location.href = baseUrl + '/src/view/admin/index.php';
		}
	})
}
