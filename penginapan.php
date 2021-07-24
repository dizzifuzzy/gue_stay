<?php include_once("config/Crud.php"); include_once("config/conf.php"); $crud = new Crud();session_start();
$cari = $_GET['q'];?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SPARKER - Premium directory and listings template by Ansonika.">
    <meta name="author" content="Ansonika">
    <title><?=nama;?> - Penginapan</title>

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
	
	<!-- SPECIFIC CSS -->
	<link href="<?=css;?>blog.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?=css;?>custom.css" rel="stylesheet">
</head>

<body>
	
	<div id="page">
		
		
	<header class="header_in is_sticky menu_fixed">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-12">
					<div id="logo">
						<a href="index.php">
							<img src="<?=img;?>logo.png" width="165" height="35" alt="" class="logo_sticky">
						</a>
					</div>
				</div>
				<div class="col-lg-9 col-12">
					<!-- /top_menu -->
					<a href="#menu" class="btn_mobile">
						<div class="hamburger hamburger--spin" id="hamburger">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
					</a>
		<nav id="menu" class="main-menu">
			<ul>
				<li><span><a href="index.php">Beranda</a></span></li>
				<?php if($_SESSION['status']=="user"){?>
				<li><span><a href="account.php">Akun Saya</a></span></li>
				<li><a href="logout.php" class="btn_add">Logout</a></li>
				<?php }elseif($_SESSION['status']=="admin"){?>
				<li><span><a href="admin">Akun Saya</a></span></li>
				<li><a href="logout.php" class="btn_add">Logout</a></li>
				<?php }else{?>
				<li><a href="login.php" class="btn_add">Login</a></li>
				<?php }?>
			</ul>
		</nav>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->		
	</header>
	<!-- /header -->
	
	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>Akun Saya</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
		
	<main>
		<br><br>
			<?php 
			if($cari){
				$select = $crud->getData("SELECT * FROM penginapan WHERE nama_penginapan LIKE '%$cari%'");
				if(!$select){
					echo "<center><h1>Tidak di temukan.</h1></center>";
				}
			}else{
				$select = $crud->getData("SELECT * FROM penginapan");
			}
                foreach ($select as $as) { 
                	$id = $as['id_penginapan'];
                	$nama = $as['nama_penginapan'];
                	$alamat = $as['alamat_penginapan'];
                	$deskripsi = $as['deskripsi_penginapan'];
                	$status = $as['status_penginapan'];
                	$idka = $as['kategori_penginapan'];
                	$kategori = $crud->getData("SELECT * FROM kategori WHERE id_kategori='$idka'");
                	foreach ($kategori as $kategoris) { $idk = $kategoris['kategori_penginapan']; }
                	$gambar = $crud->getData("SELECT * FROM gambar WHERE id_penginapan='$id' LIMIT 1");
                	foreach ($gambar as $gambars) { $idg = $gambars['file_gambar']; }
                	?>
						<div class="col-lg-9">
					<div class="row">
						<div class="col-md-5">
							<div class="strip grid">
								<figure>
									<a href="post.php?id=<?php echo $id;?>"><img src="style/gambar/<?php echo $idg;?>" class="img-fluid" alt="">
										<div class="read_more"><span>Lihat</span></div>
									</a>
									<small><?php echo $idk;?></small>
								</figure>
								<div class="wrapper">
									<h3><a href="post.php?id=<?php echo $id;?>"><?php echo $nama;?></a></h3>
									<a class="address"><?php echo $alamat;?></a>
								</div>
								<ul>
									<li><span class="loc_open"><?php echo $status;?></span></li>
									<li>
										<div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
									</li>
								</ul>
							</div>
						</div>
			<?php } ?>
			</div>
			</div>
	</main>
	<!--/main-->
	
<?php include "footer.phtml";?>

	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="<?=js;?>common_scripts.js"></script>
	<script src="<?=js;?>functions.js"></script>
	<script src="<?=assets;?>validate.js"></script>
	<script src="admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.js"></script>
  
</body>
</html>