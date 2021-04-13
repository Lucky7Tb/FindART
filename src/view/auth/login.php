<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
    <link href="../../assets/css/login.css" rel="stylesheet" type="text/css">
    <link href='//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    
    <div class="container">
        <img src="../../assets/img/findart_logo.png" alt="logo.png">
        <h1>FindART</h1>

        <div class="form">
            <form action="post" id="form-login">
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" autocomplete="off" required><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" required><br>
                <button id="btn-login" type="submit" name="login">Login</button>
            </form>
            <a href="register.php">Belum punya akun?</a>
        </div>
        
    </div>

    <script src="../../assets/js/login.js"></script>
</body>
</html>
