<?php

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';

$artId = $_POST['art_id'];
$jobAcceptedId = $_POST['job_accepted_id'];
$rating = $_POST['rating'];
$createdAt = getTodayDate();
$updatedAt = $createdAt;

$userId = $_SESSION['user']['id'];
$artFinderId = select("SELECT `id` FROM `art_finder` WHERE `user_id` = '$userId'");
$artFinderId = $artFinderId[0]['id'];

// Ubah art status job
$isUpdated = save("UPDATE `art` SET `job_status` = '0' WHERE `art`.`id`");

// Ubah art_accepted_job
$isUpdated = save("UPDATE `art_accepted_job` SET `job_status` = '0' WHERE `art_accepted_job`.`id` = '$jobAcceptedId'");

// Masukan rating art
$isCreated = save("
	INSERT INTO `art_rating` (`art_id`, `art_finder_id`, `rating`, `created_at`, `updated_at`) 
	VALUES('$artId', '$artFinderId', '$rating', '$createdAt', '$updatedAt');
");

if ($isCreated != -1) {
	response(200, null, "Berhasil memberhentikan art");
}

response(500, null, "Terjadi kesalahan pada server");

