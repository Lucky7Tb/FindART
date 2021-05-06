<?php

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';

$artFinderId = select("
	SELECT `id` FROM `art_finder` WHERE `user_id` = '" . $_SESSION['user']['id'] . "'
");

$artFinderId = $artFinderId[0]['id'];

$query = "
	SELECT `art_accepted_job`.`id`, `art`.`id` AS `art_id`, `art`.`full_name` AS `art_name`, `users`.`contact_number` AS `art_number`, `photos`.`photo_url` AS `art_photo`
	FROM `art_accepted_job`
	JOIN `art` ON `art`.`id` = `art_accepted_job`.`art_id`
	JOIN `users` ON `users`.`id` = `art`.`user_id`
	JOIN `photos` ON `photos`.`id` = `users`.`photo_id`
	WHERE `art_accepted_job`.`art_finder_id` = '$artFinderId' AND
	`art_accepted_job`.`job_status` = '1'
";

$data = select($query);

response(200, $data, "Berhasil mengambil art");