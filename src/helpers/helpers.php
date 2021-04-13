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

function getTodayDate()
{
	date_default_timezone_set('Asia/Jakarta');
	
	return date("Y-m-d H:i:s");
}

function checkIsLogin()
{
	if (!isset($_SESSION['user'])) {
		header("Location:" . BASEURL . "/src/view/auth/login.php");
		exit();
	}
}

function checkUser()
{
	if (isset($_SESSION['user'])) {
		switch ($_SESSION['user']['role']) {
			case '0':
				header("Location:" . BASEURL . "/src/view/admin/");
				exit();
				break;
			case '1':
				header("Location:" . BASEURL . "/src/view/art/");
				exit();
				break;
		}
	}
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
