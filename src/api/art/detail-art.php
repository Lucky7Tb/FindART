<?php

require __DIR__ . '/../../config/app.php';
require __DIR__ . '/../../helpers/helpers.php';
require __DIR__ . '/../../helpers/query.php';
$app = config();

$artId = $_GET['id'];

$query = "
	SELECT `art`.`full_name` AS `art_name`, `art`.`art_description`, `users`.`address`, `provinces`.`name` AS `province`, `cities`.`name` AS `city`, `districts`.`name` AS `district`, `sub_districts`.`name` AS `sub_district`, `photos`.`photo_url` as `art_photo`
	FROM `art`
	JOIN `users` ON `users`.`id` = `art`.`user_id`
	JOIN `provinces` ON `provinces`.`id` = `users`.`province_id`
	JOIN `cities` ON `cities`.`id` = `users`.`city_id`
	JOIN `districts` ON `districts`.`id` = `users`.`district_id`
	JOIN `sub_districts` ON `sub_districts`.`id` = `users`.`sub_district_id`
	JOIN `photos` ON `photos`.`id` = `users`.`photo_id`
	WHERE `art`.`id` = '$artId'
";

$data = select($query);

if (count($data) < 1) {
	response(404, null, "Art tidak ditemukan");
}

response(200, $data, 'Berhasil mengambil detail ART');
