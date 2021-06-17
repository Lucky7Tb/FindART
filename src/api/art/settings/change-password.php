<?php

require __DIR__ . '/../../../config/app.php';
require __DIR__ . '/../../../helpers/helpers.php';
require __DIR__ . '/../../../helpers/query.php';

apiCheckLogin();

$newPassword = xssFilter($_POST['new_password']);
$confirmPassword = xssFilter($_POST['confirm_password']);

if ($newPassword != $confirmPassword) {
	response(400, null, 'Password tidak sama');
}

$hashPassword = hashPassword($newPassword);
$isUpdated = save("	
	UPDATE `users`
	SET `password` = '$hashPassword'
	WHERE `id` = '". $_SESSION['user']['id'] ."'
");


if ($isUpdated) {
	response(500, null, 'Terjadi kesalahan pada server');
}

response(200, null, 'Berhasil mengubah password');
