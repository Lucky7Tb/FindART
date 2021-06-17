<?php

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';
require __DIR__ . '/../../../helpers/upload_img.php';

apiCheckLogin();

$app = config();

if ($_FILES['profile_photo']['name'] != '') {
	$dataFile = imageUpload('profile_photo');
	if ($dataFile['success']) {
		if ($_SESSION['user']['photo_id'] == '1') {
			$createdAt = getTodayDate();
			$updatedAt = $createdAt;
			$photoUrl =	$app['src']['image'] . 'dist/' . $dataFile['fileName'];
			
			$photoId = save("
				INSERT INTO `photos` (`photo_url`, `created_at`, `updated_at`)
				VALUES ('$photoUrl', '$createdAt', '$updatedAt');
			");

			if ($photoId == -1) {
				response(500, null, 'Terjadi kesalahan pada server');
			}

			$isUpdated = save("
				UPDATE `users` 
				SET `photo_id` = '$photoId' 
				WHERE `id` = '". $_SESSION['user']['id'] ."' 
			");

			if ($isUpdated == -1) {
				response(500, null, 'Terjadi kesalahan pada server');
			}

			$_SESSION['user']['photo_id'] = $photoId;
			$_SESSION['user']['photo'] = $photoUrl;
		}else {
			$path = explode(BASEURL . '/src', $_SESSION['user']['photo']);

			$updatedAt = getTodayDate();
			$photoUrl =	$app['src']['image'] . 'dist/' . $dataFile['fileName'];

			$photoId = save("
				UPDATE `photos`
				SET `photo_url` = '$photoUrl', `updated_at` = '$updatedAt'
				WHERE `id` = '". $_SESSION['user']['photo_id'] ."'
			");

			if ($photoId == -1) {
				response(500, null, 'Terjadi kesalahan pada server');
			}

			$_SESSION['user']['photo'] = $photoUrl;

			if (file_exists(__DIR__ . '/../../..' . $path[1])) {
				unlink(__DIR__ . '/../../..' . $path[1]);
			}
		}
	}else {
		response(400, null, 'Perhatikan ukuran dan format gambar');
	}
}

$contact = xssFilter($_POST['contact']);
$address = xssFilter($_POST['address']);
$description = xssFilter($_POST['description']);
$provinceId = $_POST['provinsi'];
$cityId = $_POST['kota'];
$districtId = $_POST['kecamatan'];
$subDistrictId = $_POST['kelurahan'];
$updatedAt = getTodayDate();

$isUpdated = save("
	UPDATE `users`
	SET `contact_number` = $contact, 
	`address` = '$address',
	`province_id` = '$provinceId', 
	`city_id` = '$cityId', 
	`district_id` = '$districtId', 
	`sub_district_id` = '$subDistrictId',
	`updated_at` = '$updatedAt'
	WHERE `id` = '" . $_SESSION['user']['id'] . "'
");

if ($isUpdated == -1) {
	response(500, null, 'Terjadi kesalahan pada server');
}

$isUpdate = save("
	UPDATE `art`
	SET `art_description` = '$description', `updated_at` = '$updatedAt'
	WHERE `user_id` = '". $_SESSION['user']['id'] ."'
");

if ($isUpdated == -1) {
	response(500, null, 'Terjadi kesalahan pada server');
}

$_SESSION['user']['contact_number'] = $contact; 
$_SESSION['user']['art_description'] = $description; 
$_SESSION['user']['address'] = $address; 
$_SESSION['user']['province_id'] = $provinceId; 
$_SESSION['user']['city_id'] = $cityId; 
$_SESSION['user']['district_id'] = $districtId; 
$_SESSION['user']['sub_district_id'] = $subDistrictId; 

response(200, null, 'Berhasil mengubah setting');