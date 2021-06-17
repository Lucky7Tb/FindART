<?php 

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';

apiCheckLogin();

$jobId = $_GET['id'];

$query = "
	SELECT `job_vacancy`.`id`, `job_vacancy`.`photo_id`, `job_vacancy`.`job_description`, `job_vacancy`.`job_payment`, `art_finder`.`full_name` AS `finder`, `photos`.`photo_url` AS thumbnail, `users`.`address` AS `address`, `provinces`.`name` AS `province_name`, `cities`.`name` AS `city_name`, `districts`.`name` AS `district_name`, `sub_districts`.`name` AS `sub_district_name`
	FROM `job_vacancy` 
	JOIN `art_finder` ON `art_finder`.`id` = `job_vacancy`.`art_finder_id` 
	JOIN `photos` ON `photos`.`id` = `job_vacancy`.`photo_id` 
	JOIN `users` ON `users`.`id` = `art_finder`.`user_id`
	JOIN `provinces` ON `provinces`.`id` = `users`.`province_id`
	JOIN `cities` ON `cities`.`id` = `users`.`city_id`
	JOIN `districts` ON `districts`.`id` = `users`.`district_id`
	JOIN `sub_districts` ON `sub_districts`.`id` = `users`.`sub_district_id`
	WHERE `job_vacancy`.`id` = '$jobId'
";

$data = select($query);

if (empty($data)) {
    response(404, null, "Data tidak ditemukan");
}
response(200, $data[0], 'Berhasil memuat detail lowongan');
