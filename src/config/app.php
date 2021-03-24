<?php
session_start();

function baseUrl()
{
	return "http://localhost/findart";
}

function config()
{
	$app = [
		"src" => [
			"image" => baseUrl()."/src/assets/img/",
			"css" => baseUrl()."/src/assets/css/",
			"js" => baseUrl()."/src/assets/js/",
		],
		"template" => __DIR__ . "/../resource/template/",
		"uploadDir" => __DIR__ . "/../assets/img/"
	];

	return $app;
}