<?php

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';
$app = config();

apiCheckLogin();

$jobId = $_POST['id'];

$jobThumbnail = select("
	SELECT `photos`.`photo_url`, `photos`.`id`
	FROM `job_vacancy`
	JOIN `photos` ON `photos`.`id` = `job_vacancy`.`photo_id`
	WHERE `job_vacancy`.`id` = '$jobId';
");

$thumbnail = explode($app['src']['image'].'dist/', $jobThumbnail[0]['photo_url']);

if (file_exists($app['uploadDir']. $thumbnail[1])) {
	unlink($app['uploadDir'] . $thumbnail[1]);
}

$isDeleted = delete("DELETE FROM `job_vacancy` WHERE `job_vacancy`.`id` = '$jobId'");

if ($isDeleted) {
	$isDeleted = delete("DELETE FROM `photos` WHERE `photos`.`id` = '".$jobThumbnail[0]['id']."'");

	if ($isDeleted) {
		response(200, null, 'Berhasil menghapus lowongan kerja');
	}
}
