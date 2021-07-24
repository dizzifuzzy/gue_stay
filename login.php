<?php include_once("config/Crud.php"); include_once("config/conf.php"); $crud = new Crud(); session_start(); 
if($_SESSION['status']){
    header("location:index.php");
}?>
<!DOCTYPE php>
<php lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="SPARKER - Premium directory and listings template by Ansonika.">
		<meta name="author" content="Ansonika">
		<title><?=nama;?> - Masuk</title>

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

	<body id="login_bg">
		<nav id="menu" class="fake_menu"></nav>
		<div id="login">
			<aside>
				<figure>
					<a href="index.php"><img src="<?=img;?>logo.png" width="165" height="35" alt="" class="logo_sticky"></a>
				</figure>
				<form method="POST" autocomplete="off">
					<?php 
					if(isset($_POST['masuk'])){  
						$email = $crud->escape_string($_POST['email']);
						$pass = $crud->escape_string($_POST['password']);
						$result = $crud->getData("SELECT * FROM member WHERE email_member='$email' AND pswd_member='$pass'");
						$cekadmin = $crud->getData("SELECT * FROM admin WHERE email_adm='$email' AND pswd_adm='$pass'");
						if($result){    
							foreach ($result as $res) {
								$id = $res['id_member'];
							}
							$_SESSION['status']='user';
							$_SESSION['id'] = $id;
							header("location:index.php");
						}elseif($cekadmin){
							foreach ($cekadmin as $res) {
								$id = $res['id_adm'];
							}
							$_SESSION['status']='admin';
							$_SESSION['id'] = $id;
							header("location:admin/index.php");
						}else{
							echo "Email/Password anda salah!";
						}
					}
				?> 
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
					<i class="icon_lock_alt"></i>
				</div>
				<input type="submit" name="masuk" class="btn_1 rounded full-width add_top_30" value="Masuk">
				<div class="text-center add_top_10">Belum mempunyai akun? <strong><a href="register.php">Klik disini</a></strong></div>
			</form>
			<div class="copy">© 2019 <?=nama;?></div>
		</aside>
	</div>

	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Lupa Password</h3>
		</div>
		<div class="form-group">
			<label>Please confirm login email below</label>
			<input type="email" class="form-control" name="email_forgot" id="email_forgot">
			<i class="icon_mail_alt"></i>
		</div>
		<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
		<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
	</div>

	<!-- COMMON SCRIPTS -->
	<script src="<?=js;?>common_scripts.js"></script>
	<script src="<?=js;?>functions.js"></script>
	<script src="<?=assets;?>validate.js"></script>

</body>
</php>