<?php

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';

$id = $_POST['job_id'];

$jobThumbnailPath = select("
	SELECT photos.photo_url 
	FROM job_vacancy
	JOIN photos ON photos.id = job_vacancy.photo_id
	WHERE job_vacancy.id = '$id';
");

$jobThumbnail = explode("http://localhost/findart/src/assets/img/", $jobThumbnailPath[0]['photo_url']);

if (file_exists(__DIR__.'/../../../assets/img/'.$jobThumbnail[1])) {
	unlink(__DIR__ . '/../../../assets/img/' . $jobThumbnail[1]);
}

// if (isset($_GET['id']) && $_GET['id'] !== "") {
// 	$query .= "
// 		WHERE job_vacancy.id = '" . $_GET['id'] . "'
// 		ORDER BY job_vacancy.created_at DESC
// 	";
// 	$jobData = select($query);

// 	response(200, $jobData[0], 'Berhasil memuat data lowongan');
// } else {
// 	$query .= "ORDER BY job_vacancy.created_at DESC";
// 	$jobData = select($query);
// 	response(200, $jobData, 'Berhasil memuat data lowongan');
// }
