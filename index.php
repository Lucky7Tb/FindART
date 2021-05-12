<?php
require __DIR__ . '/src/config/app.php';
require __DIR__ . '/src/helpers/helpers.php';
checkUser();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Landing Page FindART</title>
	<link href="./src/assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="./src/assets/css/landing.css" rel="stylesheet" type="text/css">
	<link href='//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="container">
		<div class="header">
			<img src="src/assets/img/findart_logo_2.png" alt="logo.png">
		</div>
	
		<div class="content">
			<div class="content-left">
				<h1>FindART</h1>
				<p>Tempat Mencari</p>
				<p style="margin-bottom: 30px;">Asisten Terbaik Untuk Anda</p>
				<a href="./src/view/auth/register.php" class="register-button">Get Started</a><br>
				<a href="./src/view/auth/login.php" class="login-button">Login</a>
	
			</div>
			<div class="content-right">
				<img src="./src/assets/img/cleaning-service.png" alt="cleaning-service.png">
			</div>
		</div>
	</div>

	<footer>
		<p>&copy; FindART 2021. Made With &#10084;</p>
	</footer>
</body>

</html>