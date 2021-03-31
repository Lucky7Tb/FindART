<?php

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';
require __DIR__ . '/../../../helpers/upload_img.php';
$app = config();

$jobId = $_POST['job_id'];
$photoId = $_POST['photo_id'];
$jobDescription = $_POST['job_description'];
$jobPayment = $_POST['job_payment'];
$jobDueDate = $_POST['job_due_date'];
$updatedAt = getTodayDate();

$isUpdated = save("
	UPDATE job_vacancy SET `job_description` = '$jobDescription', `job_payment` = '$jobPayment', `job_due_date` = '$jobDueDate', `updated_at` = '$updatedAt' WHERE job_vacancy.id = '$jobId'
");

if ($isUpdated != -1) {
	if (isset($_FILES['job_thumbnail'])) {
		//Upload image
		$photo = imageUpload('job_thumbnail');

		if (!$photo['success']) {
			response(400, null, 'Harap perhatikan format dan ukuran foto', null);
		}

		$jobThumbnail = select("
			SELECT photos.photo_url
			FROM photos
			WHERE photos.id = '$photoId';
		");

		$thumbnail = explode($app['src']['image'], $jobThumbnail[0]['photo_url']);

		if (file_exists($app['uploadDir'] . $thumbnail[1])) {
			unlink($app['uploadDir'] . $thumbnail[1]);
		}

		$photoPath = $app['src']['image'] . $photo['fileName'];
		$photoId = save("
		UPDATE photos SET `photo_url` = '$photoPath', `updated_at` = '$updatedAt' WHERE photos.id = '$photoId'
	");
	}

	response(200, null, 'Berhasil mengubah data lowongan kerja');
}

response(500, null, 'Terjadi kesalahan pada server');
