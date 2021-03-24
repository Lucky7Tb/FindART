<?php
function hashPassword($password)
{
	return password_hash($password, PASSWORD_BCRYPT);
}

function checkPassword($password, $hashPassword)
{
	return password_verify($password, $hashPassword);
}

function xssFilter($value)
{
	return htmlspecialchars($value);
}

function response($statusCode, $data, $message, $error = null)
{
	$res = [
		"code" => $statusCode,
		"data" => $data,
		"message" => $message,
		"error" => $error
	];

	header("Content-Type: application/json");
	http_response_code($statusCode);
	die(json_encode($res));
}
