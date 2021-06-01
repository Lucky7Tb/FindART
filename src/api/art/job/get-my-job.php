<?php

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';

$userId = $_SESSION['user']['id'];
$artId = select("SELECT `id` FROM `art` WHERE `user_id` = '$userId'");
$artId = $artId[0]['id'];
$jobStatus = $_GET['status'];

$query = "
	SELECT `art_interested_job`.`job_status`, `art_interested_job`.`updated_at`, `job_vacancy`.`job_payment`, `job_vacancy`.`job_due_date`, `art_finder`.`full_name`, `users`.`contact_number`
	FROM `art_interested_job`
	JOIN `job_vacancy` ON `job_vacancy`.`id` = `art_interested_job`.`job_vacancy_id`
	JOIN `art_finder` ON `art_finder`.`id` = `job_vacancy`.`art_finder_id`
	JOIN `users` ON  `users`.`id` = `art_finder`.`user_id`
	WHERE `art_interested_job`.`art_id` = '$artId'
";

if ($jobStatus != 4) {
	$query .= "
		AND `art_interested_job`.`job_status` = '$jobStatus'
	";
}

$myJob = select($query);

response(200, $myJob, 'Berhasil mengambil data perkerjaanku');