<?php include_once("../config/Crud.php"); include_once("../config/conf.php"); include_once("../config/Fungsi.php"); $crud = new Crud(); $fungsi = new Fungsi();
$db = new DbConfig(); session_start(); 
if($_SESSION['status']!="admin"){
    header("location:../index.php");
}?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
  <title><?=nama;?> - Info Bank</title>
  
  <!-- Favicons-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
  
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Main styles -->
  <link href="css/admin.css" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="css/custom.css" rel="stylesheet">
  
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
<?php include "nav.php"; ?>
  <!-- /Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Info Bank</li>
      </ol>
    <!-- Icon Cards-->
    <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Info Bank</h2>
      </div>
        <div class="col-md-6">
        <form method="post">
        <?php 
          if($_POST['simpan']){
            $namabank = $_POST['namabank'];
            $namapenerima = $_POST['namapenerima'];
            $norek = $_POST['norek'];
            $simpan = $crud->execute("UPDATE `bank` SET `nama_bank` = '$namabank',`penerima_bank` = '$namapenerima',`no_rekening` = '$norek' WHERE `bank`.`id_bank` = 1;");
            echo "Status telah di ubah menjadi $kategori";
          }else{
            $result = $crud->getData("SELECT * FROM bank");
            foreach ($result as $res) {
              $nbank = $res['nama_bank'];
              $penerima = $res['penerima_bank'];
              $no_rek = $res['no_rekening'];
            }

          }
        ?>
          <div class="col-md-6">
          <div class="form-group">
            <label>Nama Bank</label>
            <input type="text" class="form-control" name="namabank" value="<?=$nbank;?>">
          </div>
        </div>
          <div class="col-md-6">
          <div class="form-group">
            <label>Nama Penerima</label>
            <input type="text" class="form-control" name="namapenerima" value="<?=$penerima;?>">
          </div>
        </div>
          <div class="col-md-6">
          <div class="form-group">
            <label>Nomer Rekening</label>
            <input type="text" class="form-control" name="norek" value="<?=$no_rek;?>">
          </div>
        </div>
          <p><input type="submit" name="simpan" class="btn_1 rounded full-width add_top_30" value="Simpan"></p>
          </form>
        </div>
    </div>

    </div>
    <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
<?php include "footer.phtml";?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="vendor/jquery.selectbox-0.2.js"></script>
  <script src="vendor/retina-replace.min.js"></script>
  <script src="vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/admin.js"></script>
  <!-- Custom scripts for this page-->
    <script src="js/admin-datatables.js"></script>
  
</body>
</html>
