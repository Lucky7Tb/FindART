<?php

require __DIR__. '/../../../config/app.php';
require __DIR__. '/../../../helpers/helpers.php';
require __DIR__. '/../../../helpers/query.php';
require __DIR__. '/../../../helpers/upload_img.php';
$app = config();

$userId = $_SESSION['user'][0]['id'];
$artFinderId = select("SELECT id FROM art_finder WHERE user_id = '$userId'");
$artFinderId = $artFinderId[0]['id'];
$jobDescription = $_POST['job_description'];
$jobPayment = $_POST['job_payment'];
$jobDueDate = $_POST['job_due_date'];
$isVisible = 1;
$createdAt = getTodayDate();
$updatedAt = getTodayDate();

//Upload image
$photo = imageUpload('job_thumbnail');

if (!$photo['success']) {
	response(400, null, 'Harap perhatikan format dan ukuran foto', null);
}

$photoPath = BASEURL . '/src/assets/img/' . $photo['fileName'];
$photoId = save("
	INSERT INTO photos (`photo_url`, `created_at`, `updated_at`)
	VALUES('$photoPath', '$createdAt', '$updatedAt');
");
$jobVacancyId = save("
	INSERT INTO job_vacancy (`art_finder_id`, `photo_id`, `job_description`, `job_payment`, `job_due_date`, `is_visible`, `created_at`, `updated_at`)
	VALUES ('$artFinderId', '$photoId', '$jobDescription', '$jobPayment', '$jobDueDate', '$isVisible', '$createdAt', '$updatedAt')
"
);

if ($jobVacancyId == -1) {
	response(500, null, 'Terjadi kesalahan pada server');
}

response(200, null, 'Berhasil menambah lowongan kerja');