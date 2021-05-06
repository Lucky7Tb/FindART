<?php 
require __DIR__ . '/../../config/app.php';
require __DIR__ . '/../../helpers/helpers.php';
require __DIR__ . '/../../helpers/query.php';
$app = config();

$userId = $_SESSION['user']['id'];
$cekJobStatus = select("SELECT id, job_status FROM art WHERE user_id = '$userId'");
$artId = $cekJobStatus[0]['id'];
$jobStatusArt = $cekJobStatus[0]["job_status"];
$jobVacancyId = $_POST['job_vacancy_id'];
$jobStatus = 0;
$createdAt = getTodayDate();
$updatedAt = getTodayDate();

$cekData = select("
	SELECT `art_id`, `job_vacancy_id` FROM `art_interested_job` 
	WHERE `art_id` = '$artId' AND `job_vacancy_id` = '$jobVacancyId'
");

if ($jobStatusArt > 0) {
    response(400, null, 'Anda sedang bekerja.');
}

if (count($cekData) > 0) {
    response(400, null, 'Kamu sudah apply ke lowongan ini.');
}

$query = save("
    INSERT INTO `art_interested_job`(`art_id`, `job_vacancy_id`, `job_status`, `created_at`, `updated_at`) 
    VALUES ('$artId', '$jobVacancyId', '$jobStatus', '$createdAt', '$updatedAt')
");

if ($query != -1) {
    response(200, null, 'Berhasil apply lowongan'); 
}

response(500, null, 'Terjadi kesalahan pada server');
?>