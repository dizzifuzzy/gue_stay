<?php include_once("config/Crud.php"); include_once("config/conf.php"); include_once("config/Fungsi.php");$crud = new Crud();$fungsi = new Fungsi();session_start();
$db = new DbConfig();
if(!$_GET['id']){
	header("location:index.php");
}
$idp = $_GET['id'];
$select = $crud->getData("SELECT * FROM penginapan WHERE id_penginapan='$idp'");
foreach ($select as $as) { 
    $id = $as['id_penginapan'];
    $nama = $as['nama_penginapan'];
    $alamat = $as['alamat_penginapan'];
    $deskripsi = $as['deskripsi_penginapan'];
    $status = $as['status_penginapan'];
    $idka = $as['kategori_penginapan'];
    $harga = $fungsi->rupiah($as['harga_penginapan']);
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
     $komentar = $crud->getData("SELECT * FROM komentar WHERE id_penginapan='$id'");

     $rating = $crud->getData("SELECT * FROM rating WHERE id_penginapan='$id'");
     foreach ($rating as $ratings) { 
     	$satu = $ratings['satu'];
     	$dua = $ratings['dua'];
     	$tiga = $ratings['tiga'];
     	$empat = $ratings['empat'];
     	$lima = $ratings['lima'];
    	$total = $satu+$dua+$tiga+$empat+$lima;
    	$satus = ($satu/$total)*100;
    	$duas = ($dua/$total)*100;
    	$tigas = ($tiga/$total)*100;
    	$empats = ($empat/$total)*100;
    	$limas = ($lima/$total)*100;
    	$idrating = $ratings['id_rating'];
     }
    } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SPARKER - Premium directory and listings template by Ansonika.">
    <meta name="author" content="Ansonika">
    <title><?=nama;?> - Detail</title>

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
			<a href="index.php" title="">
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
		<div class="hero_in hotels_detail">
			<div class="wrapper">
				<span class="magnific-gallery">
				<?php $gambar = $crud->getData("SELECT * FROM gambar WHERE id_penginapan='$id'");
    				foreach ($gambar as $gambars) {?>
					<a href="style/gambar/<?php echo $gambars['file_gambar'];?>" class="btn_photos" title="Photo title" data-effect="mfp-zoom-in">View photos</a>
					<?php }?>
				</span>
			</div>
		</div>
		<!--/hero_in-->
		
		<nav class="secondary_nav sticky_horizontal_2">
			<div class="container">
				<ul class="clearfix">
					<li><a href="#description" class="active">Description</a></li>
					<li><a href="#reviews">Reviews</a></li>
					<li><a href="#sidebar">Booking</a></li>
				</ul>
			</div>
		</nav>

		<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						<section id="description">
							<div class="detail_title_1">
								<div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
								<h1><?php echo $nama;?></h1>
								<a class="address"><?php echo $alamat;?></a>
							</div>
							<p><?php echo $deskripsi;?>.</p>
							<h5 class="add_bottom_15">Fasilitas</h5>
							<div class="row add_bottom_30">
								<div class="col-lg-6">
									<ul class="bat">
										<li><img src="<?=img;?>hotel_facilites_icon_3.svg" alt=""> <b><?php echo $kamartid;?> Kamar Tidur</b></li>
										<?php if($wifi){?>
										<li><img src="<?=img;?>hotel_facilites_icon_4.svg" alt=""> <b>Free Wifi</b></li>
										<?php } ?>
										<li><img src="<?=img;?>hotel_facilites_icon_6.svg" alt=""> <b><?php echo $kamarman;?> Kamar Mandi</b></li>
										<li> <b>Garasi : <?php echo $garasi;?></b></li>
									</ul>
								</div>
							</div>
							<!-- /row -->	
							Harga : <?=$harga;?>					
							<hr>
						</section>
						<!-- /section -->
					
						<section id="reviews">
							<h2>Reviews</h2>
							<div class="reviews-container add_bottom_30">
								<div class="row">
									<div class="col-lg-9">
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: <?=$limas;?>%" aria-valuenow="<?=$limas;?>" aria-valuemin="0" aria-valuemax="<?=$total;?>"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong><?=$lima;?> Bintang</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: <?=$empats;?>%" aria-valuenow="<?=$empats;?>" aria-valuemin="0" aria-valuemax="<?=$total;?>"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong><?=$empat;?> Bintang</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: <?=$tigas;?>%" aria-valuenow="<?=$tigas;?>" aria-valuemin="0" aria-valuemax="<?=$total;?>"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong><?=$tiga;?> Bintang</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: <?=$duas;?>%" aria-valuenow="<?=$duas;?>" aria-valuemin="0" aria-valuemax="<?=$total;?>"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong><?=$dua;?> Bintang</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: <?=$satus;?>%" aria-valuenow="<?=$satus;?>" aria-valuemin="0" aria-valuemax="<?=$total;?>"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong><?=$satu;?> Bintang</strong></small></div>
										</div>
										<!-- /row -->
									</div>
								</div>
								<!-- /row -->
							</div>
						<?php $komentar = $crud->getData("SELECT * FROM komentar k JOIN member m ON k.id_member = m.id_member WHERE id_penginapan = '$id'");
						foreach ($komentar as $komentars) {?>
							<div class="reviews-container">
								<div class="review-box clearfix">
									<figure class="rev-thumb"><img src="<?=img;?>avatar2.jpg" alt="">
									</figure>
									<div class="rev-content">
										<div class="rev-info">
											<?=$komentars['nama_member'];?> – <?=$komentars['tanggal_komentar'];?>
										</div>
										<div class="rev-text">
											<p>
												<?=$komentars['isi_komentar'];?>
											</p>
										</div>
									</div>
								</div>
								<!-- /review-box -->
							</div>
						<?php } ?>
							<!-- /review-container -->
						</section>
						<!-- /section -->
						<hr>
						<?php if($_SESSION['status']){?>
							<div class="add-review">
								<h5>Leave a Review</h5>
								<form method="post">
									<?php
									if($_POST['submit']){
										$rating = $_POST['rating_review'];
										if($rating==1){
											$ini = "satu";
											$tambh = $satu;
										}elseif($rating==2){
											$ini = "dua";
											$tambh = $dua;
										}elseif($rating==3){
											$ini = "tiga";
											$tambh = $tiga;
										}elseif($rating==4){
											$ini = "empat";
											$tambh = $empat;
										}elseif($rating==5){
											$ini = "lima";
											$tambh = $lima;
										}
										$tambah = 1+$tambh;
										$komentar = $_POST['review_text'];
										$idorang = $_SESSION['id'];
										$date = date('Y-m-d H:i:s');
										$cek = $crud->getData("SELECT * FROM about_rating WHERE id_rating='$idrating' AND id_member='$idorang'");
										if($cek){
											echo "Komentar hanya bisa di lakukan 1 kali";
										}else{
											$insertkomen = $crud->execute("INSERT INTO komentar(id_member,isi_komentar,tanggal_komentar,id_penginapan) VALUES('$idorang','$komentar','$date','$idp')");
											$insertrating = $crud->execute("UPDATE `rating` SET `$ini` = '$tambah' WHERE `rating`.`id_penginapan` = $id;");
											$ambil = $crud->getData("SELECT * FROM rating WHERE id_penginapan = '$id'");
											foreach($ambil as $ambils){
												$id_rat = $ambils['id_rating'];
											}
											$insertabout = $crud->execute("INSERT INTO about_rating(pilih_ar,id_rating,id_member) VALUES('$rating','$id_rat','$idp')");
											
										}

									} 
									?>
									<div class="row">
										<div class="form-group col-md-6">
											<label>Rating </label>
											<div class="custom-select-form">
											<select name="rating_review" id="rating_review" class="wide">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5" selected>5</option>
											</select>
											</div>
										</div>
										<div class="form-group col-md-12">
											<label>Your Review</label>
											<textarea name="review_text" id="review_text" class="form-control" style="height:130px;"></textarea>
										</div>
										<div class="form-group col-md-12 add_top_20 add_bottom_30">
											<input type="submit" name="submit" class="btn_1" id="submit-review">
										</div>
									</div>
								</form>
							</div>
							<?php } ?>
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
							<a href="checkout.php?id=<?=$id;?>" class=" add_top_30 btn_1 full-width purchase">Bayar Sekarang</a>
					</aside>
				</div>
				<!-- /row -->
		</div>
		<!-- /container -->
		
	</main>
	<!--/main-->
	
<?php include "footer.phtml";?>

	<!--/footer-->
	</div>
	<!-- page -->
	
	<!-- Sign In Popup -->
	<!-- /Sign In Popup -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="<?=js;?>common_scripts.js"></script>
	<script src="<?=js;?>functions.js"></script>
	<script src="<?=assets;?>validate.js"></script>
	
	<!-- Map -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="<?=js;?>map_single_hotel.js"></script>
	<script src="<?=js;?>infobox.js"></script>
	
	<!-- INPUT QUANTITY  -->
	<script src="<?=js;?>input_qty.js"></script>
	
	<!-- DATEPICKER  -->
	<script>
	$(function() {
	  $('input[name="dates"]').daterangepicker({
		  autoUpdateInput: false,
		  parentEl:'#input-dates',
		  opens: 'left',
		  locale: {
			  cancelLabel: 'Clear'
		  }
	  });
	  $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
		  $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format('MM-DD-YY'));
	  });
	  $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
		  $(this).val('');
	  });
	});
	</script>
  
</body>
</html>