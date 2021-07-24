<?php include_once("config/Crud.php"); include_once("config/conf.php"); $crud = new Crud();session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SPARKER - Premium directory and listings template by Ansonika.">
    <meta name="author" content="Ansonika">
    <title><?=nama;?> - Halaman Utama</title>

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

<body>
		
	<div id="page">
		
	<header class="header menu_fixed">
		<div id="logo">
			<a href="index.php" title="Sparker - Directory and listings template">
				<img src="<?=img;?>logo.png" width="165" height="35" alt="" class="logo_normal">
				<img src="<?=img;?>logo.png" width="165" height="35" alt="" class="logo_sticky">
			</a>
		</div>
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
	</header>
	<!-- /header -->
	
	<main>
		<section class="hero_single version_5">
			<div class="wrapper">
				<div class="container">
					<div class="row justify-content-center pt-lg-5">
						<div class="col-xl-5 col-lg-6">
							<h3>Cari Penginapan?</h3>
							<form method="get" action="penginapan.php">
								<div class="custom-search-input-2">
									<div class="form-group">
										<input class="form-control" type="text" name="q" placeholder="Judul">
										<i class="icon_pin_alt"></i>
									</div>

									<input type="submit" value="Search">
								</div>
							</form>
						</div>
						<div class="col-xl-5 col-lg-6 text-right d-none d-lg-block">
							<img src="<?=img;?>graphic_home_2.svg" alt="" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</section>
		<div class="container-fluid margin_80_55">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Penginapan</h2>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
			<?php $select = $crud->getData("SELECT * FROM penginapan");
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
				<div class="item">
					<div class="strip grid">
						<figure>
							<a href="post.php?id=<?php echo $id;?>"><img src="style/gambar/<?php echo $idg;?>" class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>Lihat</span></div></a>
							<small><?php echo $idk;?></small>
						</figure>
						<div class="wrapper">
							<h3><a href="post.php?id=<?php echo $id;?>"><?php echo $nama;?></a></h3>
							<p><?php echo $alamat;?></p>
						</div>
						<ul>
							<li><span class="loc_open"><?php echo $status;?></span></li>
							<li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
						</ul>
					</div>
				</div>
				<?php } ?>
			</div>
			<!-- /carousel -->
			<div class="container">
				<div class="btn_home_align"><a href="penginapan.php" class="btn_1 rounded">Lihat Semua</a></div>
			</div>
			<!-- /container -->
		</div>
		<!-- /container -->
		<div class="call_section image_bg">
			<div class="wrapper">
				<div class="container margin_80_55">
					<div class="main_title_2">
						<span><em></em></span>
						<h2>How it Works</h2>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="box_how wow">
								<i class="pe-7s-search"></i>
								<h3>Search Locations</h3>
								<p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent eloquentiam id.</p>
								<span></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box_how">
								<i class="pe-7s-info"></i>
								<h3>View Location Info</h3>
								<p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent eloquentiam id.</p>
								<span></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box_how">
								<i class="pe-7s-like2"></i>
								<h3>Book, Reach or Call</h3>
								<p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent eloquentiam id.</p>
							</div>
						</div>
					</div>
					<!-- /row -->
					<p class="text-center add_top_30 wow bounceIn" data-wow-delay="0.5"><a href="register.php" class="btn_1 rounded">Register Now</a></p>
				</div>
			</div>
			<!-- /wrapper -->
		</div>
		<!--/call_section-->
	</main>
	<!-- /main -->

<?php include "footer.phtml";?>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="<?=js;?>common_scripts.js"></script>
	<script src="<?=js;?>functions.js"></script>
	<script src="<?=assets;?>validate.js"></script>

</body>
</html>