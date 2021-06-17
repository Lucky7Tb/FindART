<?php

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';

apiCheckLogin();

$artId = $_POST["art_id"];
$jobId = $_POST["job_id"];
$createdAt = getTodayDate();
$updatedAt = getTodayDate();

$query = "
	SELECT `job_status` FROM `art`
	WHERE `id` = '$artId';
";

$data = select($query);

$jobStatus = $data[0]['job_status'];

if ($jobStatus == "1") {
	response(400, null, "ART sudah bekerja. Silahkan pilih yang lain");
}

$query = "
	UPDATE `art_interested_job` 
	SET `job_status` = IF(art_id != $artId, 1, 2), `updated_at` = '$updatedAt'
	WHERE `job_vacancy_id` = '$jobId'
";

$isUpdated = save($query);

if ($isUpdated == -1) {
	response(500, null, 'Terjadi kesalahan pada server');
}

$query = "
	UPDATE job_vacancy 
	SET is_visible = '0', updated_at = '$updatedAt'
	WHERE id = '$jobId'
";

$isUpdated = save($query);

if ($isUpdated == -1) {
	response(500, null, 'Terjadi kesalahan pada server');
}

$artFinderId = select("
	SELECT id FROM art_finder WHERE user_id = '". $_SESSION['user']['id'] ."'
");

$artFinderId = $artFinderId[0]['id'];

$query = "
	INSERT INTO art_accepted_job (`art_id`, `art_finder_id`, `job_vacancy_id`, `job_status`, `created_at`, `updated_at`)
	VALUES ('$artId', '$artFinderId', '$jobId', '1', '$createdAt', '$updatedAt')
";

$isInserted = save($query);

if ($isInserted == -1) {
	response(500, null, 'Terjadi kesalahan pada server');
}

$query = "
	UPDATE art
	SET job_status = '1'
	WHERE id = '$artId'
";

$isUpdated = save($query);

if ($isUpdated == -1) {
	response(500, null, 'Terjadi kesalahan pada server');
}

response(200, null, "Berhasil memilih ART");
