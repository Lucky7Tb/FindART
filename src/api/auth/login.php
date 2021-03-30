<?php
require __DIR__ . '/../../helpers/helpers.php';
require __DIR__ . '/../../helpers/query.php';

$username = $_POST['username'];
$password = $_POST['password'];

$user = select("
	SELECT USERS.id, USERS.password, USERS.contact_number, USERS.address, USERS.role, USERS.province_id, USERS.city_id, USERS.district_id, USERS.sub_district_id, photos.photo_url AS photo
	FROM users
	JOIN photos ON users.photo_id = photos.id
	WHERE username = '$username'
");

if(count($user) > 0) { 

	if (checkPassword($password, $user[0]['password'])) {
		$_SESSION['user'] = $user[0];

		response(200, $user[0], 'Berhasil login');
	}

	response(401, null, 'Password anda salah');

} else {
	response(401, null, 'User tidak ditemukan');
}