<?php include_once("config/Crud.php"); include_once("config/conf.php"); include_once("config/Fungsi.php");$crud = new Crud();$fungsi = new Fungsi();session_start();
if(!$_GET['id']){
	header("location:index.php");
}elseif(!$_SESSION){
	header("location:index.php");
}
$idp = $_GET['id'];
$idm = $_SESSION['id'];
$select = $crud->getData("SELECT * FROM penginapan WHERE id_penginapan='$idp'");
foreach ($select as $as) { 
    $id = $as['id_penginapan'];
    $nama = $as['nama_penginapan'];
    $alamat = $as['alamat_penginapan'];
    $deskripsi = $as['deskripsi_penginapan'];
    $status = $as['status_penginapan'];
    $idka = $as['kategori_penginapan'];
    $harga = $fungsi->rupiah($as['harga_penginapan']);
    $hargaa = $as['harga_penginapan'];
    $kategori = $crud->getData("SELECT * FROM kategori WHERE id_kategori='$idka'");
    foreach ($kategori as $kategoris) { $idk = $kategoris['kategori_penginapan']; }
    $fasilitas = $crud->getData("SELECT * FROM fasilitas WHERE id_penginapan='$id'");
    foreach ($fasilitas as $fasilitass) { 
    	$garasi = $fasilitass['garasi'];
    	$kamarman = $fasilitass['kamar_mandi'];
    	$kamartid = $fasilitass['kamar_tidur'];
    	if($fasilitass['wifi']=="1"){
    		$wifi = "Free Wifi";
    	}
     }
    }
$mem = $crud->getData("SELECT * FROM member WHERE id_member='$idm'");
foreach ($mem as $member) { 
    $namam = $member['nama_member'];
    $alamats = $member['alamat_member'];
    $nohp = $member['nohp_member'];
    }
$bank = $crud->getData("SELECT * FROM bank");
foreach ($bank as $bank) { 
    $namabank = $bank['nama_bank'];
    $namapenerima = $bank['penerima_bank'];
    $norek = $bank['no_rekening'];
    }
     ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SPARKER - Premium directory and listings template by Ansonika.">
    <meta name="author" content="Ansonika">
    <title><?=nama;?> - Pembayaran</title>

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
			<h1>Chekout - Booking</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
	
	<main>
		<form method="post">
		<div class="container margin_60">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="step first">
						<h3>1. User info and billing address</h3>
					<div class="tab-content checkout">
						<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
							<div class="form-group">
								<input type="text" name="nama" class="form-control" value="<?=$namam;?>" placeholder="nama">
							</div>
							<div class="form-group">
								<input type="text" name="alamat" class="form-control" value="<?=$alamats;?>" placeholder="alamat">
							</div>
							<!-- /row -->
							<div class="form-group">
								<input type="text" name="hp" class="form-control" value="<?=$nohp;?>" placeholder="no hp">
							</div>
							<hr>

							<div id="other_addr_c" class="pt-2">
							</div>
							<!-- /other_addr_c -->
							<hr>
						</div>

					</div>
					</div>
					<!-- /step -->
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step middle">
						<h3>2. Payment Method</h3>
						<div class="payments">
							<ul>
								<li>
									<label class="container_radio">Transfer Bank
										<input type="radio" name="payment" checked>
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
						</div>
						<div class="payment_info d-none d-sm-block">
							<p>Bank : <?=$namabank;?></p>
							<p>No Rekening : <?=$norek;?></p>
							<p>Atas Nama : <?=$namapenerima;?></p>
						</div>
					</div>
					<!-- /step -->
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step last">
						<h3>3. Order Summary</h3>
					<div class="box_general summary">
						<ul>
							<li>Penginapan <span class="float-right"><?=$nama;?></span></li>
							<li>Kategori Penginapan <span class="float-right"><?=$idk;?></span></li>
							<li>Alamat Penginapan <span class="float-right"><?=$alamat;?></span></li>
							<li>TOTAL Harga <span class="float-right"><?=$harga;?></span></li>
						</ul>
						<textarea class="form-control add_bottom_15" name="catatan" placeholder="Additional notes.." style="height: 100px;"></textarea>
						<div class="form-group">
								<label class="container_check">Please accepts <a target="_blank" href="#0">Terms and conditions</a>.
								  <input type="checkbox" checked>
								  <span class="checkmark"></span>
								</label>
							</div>
						<?php if($_POST['submit']){
							if(!$_POST['hp']){
								echo "Nomor hp tidak boleh kosong";
							}else{
								$catatan = $_POST['catatan'];
								$date = date('Y-m-d H:i:s');
								$hp = $_POST['hp'];
								$alama = $_POST['alamat'];
								$id_tran = rand(10000,90000);
								$insertrating = $crud->execute("UPDATE `member` SET `nohp_member` = '$hp' , `alamat_member` = '$alamat'  WHERE `member`.`id_member` = $idp;");
								$inserttransaksi = $crud->execute("INSERT INTO transaksi(id_transaksi,id_member,id_penginapan,tanggal_transaksi,total_harga,status_transaksi,catatan_transaksi) VALUES('$id_tran','$idm', '$idp', '$date','$hargaa','Belum Lunas','$catatan')");
								echo ' <meta http-equiv="Refresh" content="0; url=invoice.php?invoice='.$id_tran.'">';
							}

						}?>
						<input type="submit" name="submit" class="btn_1" id="submit-review">
					</div>
					<!-- /box_general -->
					</div>
					<!-- /step -->
				</div>
			</div>
			<!-- /row -->
		</div>
	</form>
		<!-- /container -->
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

  
</body>
</html>