<?php
require __DIR__ . '/../../helpers/helpers.php';
require __DIR__ . '/../../helpers/query.php';

$username = $_POST['username'];
$password = $_POST['password'];

$user = select("SELECT * FROM users WHERE username = '$username'");

if(count($user) > 0) { 

	if (checkPassword($password, $user[0]['password'])) {
		response(200, $user, "Berhasil login", null);
	}

	response(403, null, "Password anda salah", null);

} else {
	response(403, null, "User tidak ditemukan", null);
}