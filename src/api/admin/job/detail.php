<?php

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';

$jobId = $_GET['id'];

$interestedART = select("
	SELECT art_interested_job.id, art.id AS art_id, art.full_name AS art_name, AVG(art_rating.rating) AS art_rating, users.address AS art_address, photos.photo_url AS art_photo 
	FROM art_interested_job
	JOIN art ON art.id = art_interested_job.art_id
	LEFT JOIN art_rating ON art_rating.art_id = art_interested_job.art_id
	JOIN users ON users.id = art.user_id 
	JOIN photos ON photos.id = users.photo_id
	WHERE art_interested_job.job_vacancy_id = '$jobId'
	GROUP BY art_interested_job.art_id
");

response(200, $interestedART, 'Berhasil mengambil data');