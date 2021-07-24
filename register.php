<?php include_once("config/Crud.php"); include_once("config/conf.php"); $crud = new Crud(); 
if($_SESSION['status']){
    header("location:index.php");
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SPARKER - Premium directory and listings template by Ansonika.">
    <meta name="author" content="Ansonika">
    <title><?=nama;?> - Daftar</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="<?=img;?>favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="<?=img;?>apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?=img;?>apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?=img;?>apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?=img;?>apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?=css;?>bootstrap.min.css" rel="stylesheet">
    <link href="<?=css;?>style.css" rel="stylesheet">
	<link href="<?=css;?>vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?=css;?>custom.css" rel="stylesheet">
	
</head>

<body id="register_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="login">
		<aside>
			<figure>
				<a href="index.php"><img src="<?=img;?>logo.png" width="165" height="35" alt="" class="logo_sticky"></a>
			</figure>
			<form method="post" autocomplete="off">
			<?php
			if($_POST['daftar']){
				$secret_key = "6LfUaZIUAAAAAFPaHbT54QaVRjjOoVe_3MSzSv5w";
				$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
				$response = json_decode($verify);
				if($response->success){
					if($_POST['nama']&&$_POST['email']&&$_POST['pw1']){
						$name = $crud->escape_string($_POST['nama']);
						$email = $crud->escape_string($_POST['email']);
						$pwd = $crud->escape_string($_POST['pw1']);
						$cekemail = $crud->getData("SELECT email FROM member WHERE email_member='$email'");
						if($cekemail){
							echo "Email yang anda masukkan telah digunakan oleh pengguna lain.";
						}else{
							$daftar = $crud->execute("INSERT INTO member(email_member,pswd_member,nama_member,alamat_member,nohp_member) VALUES('$email','$pwd','$name','','')");
							echo "<script>alert('Daftar berhasil')</script>";
							echo "<meta http-equiv='refresh' content='1 url=login.php'>";
						}
					}else{
						echo "Data ada yang belum terisi.";
					}
				}else{
					echo "Captcha Tidak Valid";
				}
			}
			?>
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input name="nama" class="form-control" type="text">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input name="email" class="form-control" type="email">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input name="pw1" class="form-control" type="password" id="password1">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="g-recaptcha" data-sitekey="6LfUaZIUAAAAACnL72XPy69tWaLZV6N1NLfKocuM"></div>
				<div id="pass-info" class="clearfix"></div>
				<input type="submit" name="daftar" class="btn_1 rounded full-width add_top_30" value="Daftar Sekarang!">
				<div class="text-center add_top_10">Sudah Mempunyai akun? <strong><a href="login.php">Klik disini</a></strong></div>
			</form>
			<div class="copy">© 2019 <?=nama;?></div>
		</aside>
	</div>
	<!-- /login -->
	
	<!-- COMMON SCRIPTS -->
    <script src="<?=js;?>common_scripts.js"></script>
	<script src="<?=js;?>functions.js"></script>
	<script src="<?=assets;?>validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="<?=js;?>pw_strenght.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>

	
	
  
</body>
</html>