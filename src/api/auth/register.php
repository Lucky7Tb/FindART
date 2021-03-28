<?php
require __DIR__.'/../../helpers/helpers.php';
require __DIR__.'/../../helpers/query.php';

$isART = $_POST['is_art'];
$provinceId = $_POST['province_id'];
$cityId = $_POST['city_id'];
$districtId = $_POST['district_id'];
$subDistrictId = $_POST['sub_district_id'];
$username = xssFilter($_POST['username']);
$password = xssFilter($_POST['password']);
$confirmPassword = xssFilter($_POST['confirm_password']);
$contactNumber = xssFilter($_POST['contact_number']);
$address = xssFilter($_POST['address']);
$fullName = xssFilter($_POST['full_name']);
$createdAt = getTodayDate();
$updatedAt = getTodayDate();

if ($password == $confirmPassword) {
	$password = hashPassword($password);

	$userId = save("
		INSERT INTO users (`province_id`, `city_id`, `district_id`, `sub_district_id`, `photo_id`, `username`, `password`, `contact_number`, `address`, ``role`, `created_at`, `updated_at`) 
		VALUES ('$provinceId', '$cityId', '$districtId', '$subDistrictId', '1', '$username', '$password', '$contactNumber', '$address', $isArt, '$createdAt', '$updatedAt');
	");

	if ($userId == -1) { 
		response(400, null, 'Username sudah ada yang menggunakan', null);
	}

	$table = $isART ? 'art' : 'art_finder';

	$insertedId = save("
		INSERT INTO {$table} (`user_id`, `full_name`, `created_at`, `updated_at`) 
		VALUES ('$userId', '$fullName', '$createdAt', '$updatedAt');
	");

	if ($insertedId == -1) {
		response(400, null, 'Username sudah ada yang menggunakan', null);
	}

	response(200, null, 'Registrasi sukses', null);
	
}else {
	response(400, null, 'Password tidak sama', null);
}
