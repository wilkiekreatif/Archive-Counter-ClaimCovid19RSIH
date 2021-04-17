<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  $_SESSION['menu']='referensi';
  include('../config.php');
 
 //agar tidak bisa di akses jika tidak login
  if (empty($_SESSION['username'])) {
  header('location:../');
  }
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Referensi Claim Covid 19 - RSIH</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
      include('sidebar.php');
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
          include('topbar.php');
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Referensi Data Pasien Covid-19</h1>
          </div>
          <div class="row">
            <!-- KONTEN REFERENSI -->
            <div class="col-lg-4 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-body">
                  <form class="form-horizontal " method="post" action="updatereferensi.php">
                    <div class="form-group has-feedback">
                      <label>Periode</label>
                      <select class="form-control" id="periodecb" name="periodecb">
                        <?php
                          $tampil = mysqli_query($connect,"SELECT nama FROM periode");
                          
                          $q=mysqli_query($connect,'SELECT * FROM referensi WHERE id="1"');
                          $data=mysqli_fetch_array($q);
                          
                          while ($w = mysqli_fetch_array($tampil)) {
                            if($data['periode']===$w['nama']){
                                  $aktif='selected';
                              }else{
                                  $aktif='';
                              }
                            echo "<option ".$aktif." value=$w[nama]>$w[nama]</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group has-feedback">
                      <label>Tahun</label>
                      <input maxlength="4" name="tahun" required class="form-control" value="<?php
                                        echo($data['tahun']);
                                    ?>"></input>
                    </div>
                    <div class="form-group has-feedback">
                    <label>Jumlah Pasien</label>
                    <input maxlength="5" name="jml_pasien" required class="form-control" value="<?php
                                      echo($data['jml_pasien']);
                                  ?>"></input>
                    </div>
                    <div class="form-group has-feedback">
                      <button type="submit" class="btn btn-primary form-control"><i class="fa fa-save fa-fw"></i> Update Referensi Berkas</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>              

          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
        include('footer.php');
      ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi ulang?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda yakin ingin keluar dari dashboard?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-primary" href="logout.php">Ya</a>
        </div>
      </div>
    </div>
  </div>

  <!-- tambah Pemberkasan Modal-->
  <div class="modal fade" id="tambah_pemberkasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Progres Pemberkasan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- FORM INPUT PEMBERKASAN -->
          <form action="vpemberkasan.php" method="post">
            <div class="form-group has-feedback">
              <input required type="text" name="jml_berkas" class="form-control" placeholder="Jumlah Berkas yang selesai..." maxlength="4">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <span>* Hanya diisi oleh angka!</span>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Simpan Data</button>
            <button class="btn btn-warning" type="reset">Reset</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
