function getMyJob() {
	fetch(`${baseUrl}/src/api/art/job/get-my-job.php`, {
		method: 'GET'
	})
	.then(function (response) {
		return response.json();
	})
	.then(function (response) {
		renderData(response.data);
	})
}

function renderData(jobData) {
	const dataBody = document.getElementById('data-body');
	let content = "";

	if (jobData.length > 0) {
		jobData.forEach(data => {
			let jobStatus;
			let jobBadge;
			let action;
			let number = data.contact_number.split('');
			number[0] = '62';
			number = number.join('');
			switch (data.job_status) {
				case '0':
					jobStatus = 'Pending';
					jobBadge = 'pending-badge';
					action = '-';
					break;
				case '1':
					jobStatus = 'Ditolak';
					jobBadge = 'reject-badge';
					action = '-';
					break;
				case '2':
					jobStatus = 'Diterima';
					jobBadge = 'accept-badge';
					action = `
						<a class='primary-button' href="https://api.whatsapp.com/send?phone=${number}&text=Halo%20saya%20yang%20bekerja%20untuk%20anda.%20Mohon%20kerja%20samanya%20ya.">
							Chat
						</a>
					`;
					break;
			}
			content += /*html*/ `
				<tr>
					<td>${data.full_name}</td>
					<td>${data.job_payment}</td>
					<td>${data.job_due_date}</td>
					<td><span class="${jobBadge}">${jobStatus}</span></td>
					<td>${action}</td>
				</tr>
			`;	
		});
	} else {
		content += /*html*/`
			<tr>
				<td colspan="5">Tidak ada data</td>
			</tr>
		`;
	}

	dataBody.innerHTML = content;
}