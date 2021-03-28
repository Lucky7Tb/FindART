<?php
session_start();

define('BASEURL', 'http://localhost/findart');

function config()
{
	$app = [
		'src' => [
			'image' => BASEURL.'/src/assets/img/',
			'css' => BASEURL.'/src/assets/css/',
			'js' => BASEURL.'/src/assets/js/',
		],
		'template' => __DIR__ . '/../resource/template/',
		'uploadDir' => __DIR__ . '/../assets/img/'
	];

	return $app;
}