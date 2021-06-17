<?php

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';

apiCheckLogin();

$query = "
	SELECT `job_vacancy`.`id`, `job_vacancy`.`photo_id`, `job_vacancy`.`job_description`, `job_vacancy`.`job_payment`, `job_vacancy`.`job_due_date`, `job_vacancy`.`updated_at`, `photos`.`photo_url` AS `thumbnail`
	FROM `job_vacancy`
	JOIN `art_finder` ON `art_finder`.`id` = `job_vacancy`.`art_finder_id`
	JOIN `photos` ON `photos`.`id` = `job_vacancy`.`photo_id`
";

if (isset($_GET['id']) && $_GET['id'] !== "") {
	$query .= "
		WHERE `job_vacancy`.`id` = '".$_GET['id']. "' AND 
		art_finder.`user_id` = '" . $_SESSION['user']['id'] . "' AND
		`job_vacancy`.`is_visible` = '1'
		ORDER BY `job_vacancy`.`created_at` DESC
	";
	$jobData = select($query);

	response(200, $jobData[0], 'Berhasil memuat data lowongan');
} else {
	$query .= "
		WHERE `art_finder`.`user_id` = '".$_SESSION['user']['id']. "' AND
		`job_vacancy`.`is_visible` = '1'
		ORDER BY `job_vacancy`.`created_at` DESC
	";
	$jobData = select($query);
	response(200, $jobData, 'Berhasil memuat data lowongan');
}
