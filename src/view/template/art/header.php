<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FindArt</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= $app['src']['css'].'bootstrap.min.css'?>">
	<link rel="stylesheet" href="<?= $app['src']['css'].'quill.snow.css'?>">
	<link rel="stylesheet" href="<?= $app['src']['css'].'style.css'?>">
	<link rel="stylesheet" href="<?= $app['src']['css'].'art.css'?>">
</head>

<body>

<?php 
	checkIsLogin(); 
	checkIsNotArt();
?>