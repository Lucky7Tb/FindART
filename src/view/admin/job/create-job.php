<?php
require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
$app = config();
require $app['template'] . 'admin/header.php';
?>

<div class="container">
	<?php require $app['template'] . 'admin/navbar.php'; ?>

	<h3>Tambah pekerjaan</h3>

	<div class="row">
		<div class="col-12">
			<form id="form-job">
				<div class="file-upload">
					<label for="job-thumbnail">Thumbnail</label>
					<input type="file" name="job_thumbnail" id="job_thumbnail" required>
				</div>

				<div class="inner-form">
					<label for="job-payment">Gaji</label>
					<input type="number" name="job_payment" id="job_payment" min="500000" required>
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
<script src="<?= $app['src']['js'] . 'admin/job/job.js' ?>"></script>
<script>
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

	formJob.addEventListener('submit', function(e) {
		e.preventDefault();

		if (editor.root.innerHTML === "<p><br></p>") {
			alert('Harap isi deskripsi pekerjaan');
			return;
		}

		const formData = new FormData();

		formData.append('job_description', editor.root.innerHTML);
		formData.append('job_payment', jobPayment.value);
		formData.append('job_due_date', jobDueDate.value);
		formData.append('job_thumbnail', jobThumbnail.files[0]);

		postJob(formData);
	})
</script>
<?php require $app['template'] . 'admin/footer.php' ?>