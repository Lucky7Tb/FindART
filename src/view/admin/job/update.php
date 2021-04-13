<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'admin/header.php';
?>

<div class="container">
	<?php require $app['template'] . 'admin/navbar.php'; ?>

	<h3>Update pekerjaan</h3>

	<div class="row">
		<div class="col-12">
			<form id="form-job">

				<input type="hidden" id="job_id">
				<input type="hidden" id="thumbnail_id">

				<div class="file-upload">
					<label for="job-thumbnail">Thumbnail</label>
					<input type="file" name="job_thumbnail" id="job_thumbnail">
				</div>

				<div class="inner-form">
					<label for="job-payment">Gaji</label>
					<input type="number" name="job_payment" id="job_payment" min="500000" value="500000" step="500000" required>
				</div>

				<div class="inner-form">
					<label for="job-duedate">Tanggal berakhir lowongan</label>
					<input type="date" name="job_duedate" id="job_duedate" pattern="\d{4}-\d{2}-\d{2}" required>
				</div>

				<div id="editor" style="height: 300px;"></div>

				<button type="submit" class="primary-button-lg" style="margin-top: 3em;">Save</button>
			</form>
		</div>
	</div>
</div>

<script src="<?= $app['src']['js'] . 'quill.min.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'app.js' ?>"></script>
<script src="<?= $app['src']['js'] . 'admin/job.js' ?>"></script>
<script>
	const jobId = document.getElementById('job_id');
	const jobThumbnailId = document.getElementById('thumbnail_id');
	const jobThumbnail = document.getElementById('job_thumbnail');
	const jobPayment = document.getElementById('job_payment');
	const jobDueDate = document.getElementById('job_duedate');
	const formJob = document.getElementById('form-job');

	jobDueDate.setAttribute('min', new Date());

	const editor = new Quill('#editor', {
		placeholder: 'Deskripsi pekerjaan',
		modules: {
			toolbar: [
				[{
					header: [1, 2, false]
				}],
				['bold', 'italic', 'underline'],
				[{
					'list': 'ordered'
				}, {
					'list': 'bullet'
				}],
				['blockquote', 'list']
			]
		},
		theme: 'snow',
	});

	const job = getDetailJob(<?= $_GET["id"] ?>);
	job.then(function(response) {
		jobId.value = response.data.id;
		jobThumbnailId.value = response.data.photo_id;
		jobPayment.value = response.data.job_payment;
		jobDueDate.value = response.data.job_due_date;
		editor.root.innerHTML = response.data.job_description;
	});

	formJob.addEventListener('submit', function(e) {
		e.preventDefault();

		if (editor.root.innerHTML === "<p><br></p>") {
			alert('Harap isi deskripsi pekerjaan');
			return;
		}

		const formData = new FormData();

		formData.append('id', jobId.value);
		formData.append('photo_id', jobThumbnailId.value);
		formData.append('job_description', editor.root.innerHTML);
		formData.append('job_payment', jobPayment.value);
		formData.append('job_due_date', jobDueDate.value);

		if (jobThumbnail.files.length !== 0) {
			formData.append('job_thumbnail', jobThumbnail.files[0]);
		}

		updateJob(formData);
	})
</script>
<?php require $app['template'] . 'admin/footer.php' ?>