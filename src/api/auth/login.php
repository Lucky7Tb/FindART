<?php
require __DIR__. '/../../config/app.php';
require __DIR__ . '/../../helpers/helpers.php';
require __DIR__ . '/../../helpers/query.php';

$username = $_POST['username'];
$password = $_POST['password'];

$user = select("
	SELECT users.id, users.password, users.contact_number, users.address, users.role, users.province_id, users.city_id, users.district_id, users.sub_district_id, photos.photo_url AS photo
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