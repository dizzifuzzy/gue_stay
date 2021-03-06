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
  <title><?=nama;?> - Tambah Penginapan</title>
  
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
        <li class="breadcrumb-item"><a href="penginapan.php">List Penginapan</a></li>
        <li class="breadcrumb-item active">Tambah Penginapan</li>
      </ol>
    <!-- Icon Cards-->
    <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Tambah Penginapan</h2>
      </div>
      <form method="post" enctype="multipart/form-data">
      <?php 
      if($_POST['simpan']){
        $nama = $crud->escape_string($_POST['nama']);
        $kategori = $crud->escape_string($_POST['kategori']);
        $alamat = $crud->escape_string($_POST['alamat']);
        $harga = $crud->escape_string($_POST['harga']);
        $deskripsi = $crud->escape_string($_POST['deskripsi']);
        $wifi = $crud->escape_string($_POST['wifi']);
        $kamartidur = $crud->escape_string($_POST['kamartidur']);
        $kamarmandi = $crud->escape_string($_POST['kamarmandi']);
        $garasi = $crud->escape_string($_POST['garasi']);
        if($nama&&$kategori&&$alamat&&$deskripsi){
          $db->connection->query("INSERT INTO penginapan(nama_penginapan,alamat_penginapan,kategori_penginapan,deskripsi_penginapan,harga_penginapan,status_penginapan) VALUES('$nama','$alamat','$kategori','$deskripsi','$harga','Available')");
          $id = $db->connection->insert_id;
          $crud->execute("INSERT INTO rating(satu,dua,tiga,empat,lima,id_penginapan) VALUES('0','0','0','0','0','$id')");
          $r = $crud->execute("INSERT INTO fasilitas(wifi,kamar_tidur,kamar_mandi,garasi,id_penginapan) VALUES('$wifi','$kamartidur','$kamarmandi','$garasi','$id')");
          for ($i=0; $i < count ($_FILES['gambar']['name']); $i++) { 
            $namagambar = $_FILES['gambar']['name'][$i];
            $tempgambar = $_FILES['gambar']['tmp_name'][$i];
            $gamb = $fungsi->upload($namagambar,$tempgambar);
            if($gamb=="success"){
              $result = $crud->execute("INSERT INTO gambar(file_gambar,id_penginapan) VALUES('$namagambar','$id')");
            }
          }

          echo "Data telah di tambahkan!";
        }else{
          echo "Data belum diisi semua.";
        }
      }
      ?>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Nama Penginapan</label>
            <input type="text" class="form-control" name="nama" placeholder="Hotel Mariott">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Kategori</label>
            <div class="styled-select">
            <select name="kategori">
            <?php $result = $crud->getData("SELECT * FROM kategori");
            foreach ($result as $res) {
             ?>
              <option value="<?php echo $res['id_kategori'];?>"><?php echo $res['kategori_penginapan'];?></option>
            <?php } ?>
            </select>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Jln. dimana ajah">
          </div>
        </div>
      </div>
      <hr>
      <!-- /row-->
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Gambar 1</label>
            <div class="col-xs-3">
              <input type="file" name="gambar[]" />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Gambar 2</label>
            <div class="col-xs-3">
              <input type="file" name="gambar[]" />
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Gambar 3</label>
            <div class="col-xs-3">
              <input type="file" name="gambar[]" />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Gambar 4</label>
            <div class="col-xs-3">
              <input type="file" name="gambar[]" />
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Gambar 5</label>
            <div class="col-xs-3">
              <input type="file" name="gambar[]" />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Gambar 6</label>
            <div class="col-xs-3">
              <input type="file" name="gambar[]" />
            </div>
          </div>
        </div>
      </div>
      <hr>
      <!-- /row-->
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Wifi</label>
            <div class="styled-select">
            <select name="wifi">
              <option value="1">Tersedia</option>
              <option value="0">Tidak Tersedia</option>
            </select>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Kamar Tidur</label>
            <div class="styled-select">
            <select name="kamartidur">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Kamar Mandi</label>
            <div class="styled-select">
            <select name="kamarmandi">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Garasi</label>
            <div class="styled-select">
            <select name="garasi">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="10"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label>Harga</label>
            <input type="number" class="form-control" name="harga" placeholder="500000">
          </div>
        </div>
      </div>
      <!-- /row-->
    <p><input type="submit" name="simpan" class="btn_1 rounded full-width add_top_30" value="Simpan"></p>
    </form>
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
              <span aria-hidden="true">??</span>
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
    <script src="vendor/chart.js/Chart.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="vendor/jquery.selectbox-0.2.js"></script>
  <script src="vendor/retina-replace.min.js"></script>
  <script src="vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/admin.js"></script>
  <!-- Custom scripts for this page-->
    <script src="js/admin-charts.js"></script>
  
</body>
</html>
