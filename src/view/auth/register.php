<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
    <link href="../../assets/css/register.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    
    <div class="container">
        <img src="../../assets/img/findart_logo.png" alt="logo.png">
        <h1>FindART</h1>

        <div class="form-control">
            <h2>Pendaftaran</h2>
            <form action="post" id="form-register">
                <div class="inner-form">
                    <label for="nama">Nama</label><br>
                    <input type="text" id="nama" name="nama"><br>

                    <label for="alamat">Alamat</label><br>
                    <textarea type="text" id="alamat" name="alamat"></textarea><br>

                    <label style="margin-right: 280px;" for="provinsi">Provinsi</label>
                    <label for="kota">Kota</label><br>

                    <input style="width: 40%; margin-right: 95px;" type="text" id="provinsi" name="provinsi">
                    <input style="width: 40%;" type="text" id="kota" name="kota"><br>

                    <label style="margin-right: 245px;" for="kecamatan">Kecamatan</label>
                    <label for="kelurahan">Kelurahan</label><br>

                    <input style="width: 40%; margin-right: 95px;" type="text" id="kecamatan" name="kecamatan">
                    <input style="width: 40%;" type="text" id="kelurahan" name="kelurahan"><br>

                    <label for="telepon">No Telepon</label><br>
                    <input type="text" id="telepon" name="telepon"><br>

                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username"><br>

                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password"><br>

                    <label for="con-password">Confirm Password</label><br>
                    <input type="password" name="con-password" id="con-password"><br>
                    
                    <label for="mendaftar">Mendaftar Sebagai</label><br>
                    <select class="select" name="mendaftar" id="mendaftar">
                        <option value="0">Pencari ART</option>
                        <option value="1">ART</option>
                    </select>
                </div>
                <button id="btn-register" type="submit" name="register">Register</button>
            </form>
            <a href="login.php">Sudah punya akun?</a>
        </div> 
        
    </div>

</body>
</html>