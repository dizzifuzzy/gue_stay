<?php include_once("config/Crud.php"); include_once("config/conf.php"); include_once("config/Fungsi.php");$crud = new Crud();$crud = new Crud(); $fungsi = new Fungsi();session_start();
$db = new DbConfig();
$idm = $_SESSION['id'];
$select = $crud->getData("SELECT * FROM member mb JOIN transaksi tr ON mb.id_member = tr.id_member WHERE mb.id_member='$idm'");
foreach ($select as $as) { 
	$nama = $as['nama_member'];
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
    <title><?=nama;?> - Riwayat</title>

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
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-md-12">
							<article class="blog">
    <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Riwayat Pemesanan</h2>
        <hr>
      </div>
       <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomer Transaksi</th>
                  <th>Nama Penginapan</th>
                  <th>Tanggal Transaksi</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomer Transaksi</th>
                  <th>Nama Penginapan</th>
                  <th>Tanggal Transaksi</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
              <?php $get = $crud->getData("SELECT * FROM transaksi tr JOIN penginapan pe ON pe.id_penginapan = tr.id_penginapan WHERE id_member='$idm'");
              foreach($get as $gut){
          ?>
                <tr>
                  <td><?php echo $gut['id_transaksi'];?></td>
                  <td><?php echo $gut['nama_penginapan'];?></td>
                  <td><?php echo $gut['tanggal_transaksi'];?></td>
                  <td><?php echo $fungsi->rupiah($gut['total_harga']);?></td>
                  <td><?php echo $gut['status_transaksi'];?></td>
                  <td><a href="up.php?id=<?=$gut['id_transaksi'];?>">Upload Bukti Pembayaran</a></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
							</article>
							<!-- /article -->
						</div>
					</div>
					
				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<div class="widget">
						<div class="widget-title">
							<h4>Menu</h4>
						</div>
						<ul class="cats">
							<li><a href="edit.php">Edit Profil</a></li>
							<li><a href="riwayat.php">Riwayat Pemesanan</span></a></li>
						</ul>
					</div>
				</aside>
				<!-- /aside -->
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
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="<?=js;?>common_scripts.js"></script>
	<script src="<?=js;?>functions.js"></script>
	<script src="<?=assets;?>validate.js"></script>
	<script src="admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.js"></script>
  
</body>
</html>