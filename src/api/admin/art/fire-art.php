<?php

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';

apiCheckLogin();

$artId = $_POST['art_id'];
$jobAcceptedId = $_POST['job_accepted_id'];
$rating = $_POST['rating'];
$createdAt = getTodayDate();
$updatedAt = $createdAt;

$jobVacancyId = select("
	SELECT `job_vacancy_id`
	FROM `art_accepted_job`
	WHERE `id` = '$jobAcceptedId'
");
$jobVacancyId = $jobVacancyId[0]['job_vacancy_id'];

$userId = $_SESSION['user']['id'];
$artFinderId = select("SELECT `id` FROM `art_finder` WHERE `user_id` = '$userId'");
$artFinderId = $artFinderId[0]['id'];

// Ubah art status job
$isUpdated = save("UPDATE `art` SET `job_status` = '0' WHERE `art`.`id`");
if ($isUpdated == -1) {
	response(500, null, "Terjadi kesalahan pada server");
}

// Ubah art_accepted_job
$isUpdated = save("UPDATE `art_accepted_job` SET `job_status` = '0' WHERE `art_accepted_job`.`id` = '$jobAcceptedId'");

if ($isUpdated == -1) {
	response(500, null, "Terjadi kesalahan pada server");
}

// Ubah art_interested_job
$isUpdated = save("
	UPDATE `art_interested_job` 
	SET `job_status` = '3', `updated_at` = '$updatedAt'
	WHERE `art_id` = '$artId' AND `job_vacancy_id` = '$jobVacancyId'
");

if ($isUpdated == -1) {
	response(500, null, "Terjadi kesalahan pada server");
}

// Masukan rating art
$isCreated = save("
	INSERT INTO `art_rating` (`art_id`, `art_finder_id`, `rating`, `created_at`, `updated_at`) 
	VALUES('$artId', '$artFinderId', '$rating', '$createdAt', '$updatedAt');
");

if ($isCreated != -1) {
	response(200, null, "Berhasil memberhentikan art");
}

response(500, null, "Terjadi kesalahan pada server");

