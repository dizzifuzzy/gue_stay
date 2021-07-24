<?php include_once("config/Crud.php"); include_once("config/conf.php"); include_once("config/Fungsi.php");$crud = new Crud();$fungsi = new Fungsi();session_start();
$idp = $_GET['invoice'];
if(!$idp){
    header("location:index.php");
}
$select = $crud->getData("SELECT * FROM transaksi tr JOIN member me ON tr.id_member = me.id_member JOIN penginapan pe ON pe.id_penginapan = tr.id_penginapan JOIN kategori ka ON pe.kategori_penginapan = ka.id_kategori WHERE tr.id_transaksi='$idp'");
foreach ($select as $as) { 
    $nama = $as['nama_member'];
    $alamat = $as['alamat_member'];
    $nohp = $as['nohp_member'];
    $tanggal = $as['tanggal_transaksi'];
    $namap = $as['nama_penginapan'];
    $hargap = $fungsi->rupiah($as['harga_penginapan']);
    $alamatp = $as['alamat_penginapan'];
    $kategori = $as['kategori_penginapan'];
    $status = $as['status_transaksi'];
    }
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="TOPTRAVEL - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    <title>Invoice - <?=$idp;?></title>

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

    <!-- YOUR CUSTOM CSS -->
    <link href="<?=css;?>custom.css" rel="stylesheet">
    
	<style>
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }
    
    .table > tbody > tr > .no-line {
        border-top: none;
    }
    
    .table > thead > tr > .no-line {
        border-bottom: none;
    }
    
    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
    </style>
</head>
<body>
  <div class="container">
    <div class="row">
        <div class="col-12">
    		<div class="invoice-title add_top_30">
    			<h2>Invoice</h2><h3 class="float-right">Order # <?=$idp;?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-6">
    				<address>
    				<strong>Informasi:</strong><br>
    					<?=$nama;?><br>
    					<?=$alamat;?><br>
    					<?=$nohp;?><br>
    				</address>
    			</div>
    			<div class="col-6 text-right">
    				<address>
        			<strong>Penginapan:</strong><br>
    					<?=$namap;?><br>
    					<?=$alamatp;?><br>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-6">
    				<address>
    					<strong>Pembayaran:</strong><br>
    					Transfer Bank<br><br>
                        <strong>Status Transaksi:</strong><br>
                        <?php if($status=="Belum Lunas"){
                            echo "<h4><font color=red>Belum Lunas</font></h4>";
                        }else{
                            echo "<h4>Sudah Lunas</h4>";
                        }
                        ?>
    				</address>
    			</div>
    			<div class="col-6 text-right">
    				<address>
    					<strong>Tanggal Transaksi:</strong><br>
    					<?=$tanggal;?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-lg-12">
    		<div class="add_top_15">
    			<h3><strong>Booking</strong></h3>
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Nama Penginapan</strong></td>
        							<td class="text-center"><strong>Kategori</strong></td>
        							<td class="text-center"><strong>Harga</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<tr>
    								<td><?=$namap;?></td>
    								<td class="text-center"><?=$kategori;?></td>
    								<td class="text-center"><?=$hargap;?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right"><?=$hargap;?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>


  </body>
</html>