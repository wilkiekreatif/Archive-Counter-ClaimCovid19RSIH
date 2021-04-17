<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  $_SESSION['menu']='dashboard';
  
  //agar tidak bisa di akses jika tidak login
  if (empty($_SESSION['username'])) {
  header('location:../');
  }

  //menampilkan angka
  include('../config.php');
  $q1 = mysqli_query($connect,"SELECT * FROM referensi WHERE id=1");
  $q2 = mysqli_query($connect,"SELECT * FROM info WHERE id=1");
  $q1data = mysqli_fetch_array($q1);
  $periode = $q1data['periode'];
  $tahun = $q1data['tahun'];
  $q2data = mysqli_fetch_array($q2);
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard Claim Covid 19 - RSIH</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Pemberkasan -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <?php
                    include('jumlah_berkas_pemberkasan.php');
                  ?>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <?php
                    include('jumlah_berkas_verifikasi.php');
                  ?>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <?php
                    include('jumlah_berkas_entry.php');
                  ?>  
                </div>
              </div>
            </div>
          </div>
          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-4 mb-4">
              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Persentase Periode <?php
                          echo($q1data['periode'].' '.$q1data['tahun']);
                      ?></h6>
                </div>
                <div class="card-body">
                  <!-- Persentase Pemberkasan -->
                  <?php
                    include('persentase_pemberkasan.php');
                  ?><br>
                  <!-- Persentase Verifikasi -->
                  <?php
                    include('persentase_verifikasi.php');
                  ?><br>
                  <!-- Persentase Entry -->
                  <?php
                    include('persentase_entry.php');
                  ?><br>
                </div>
              </div>
            </div>

            <div class="col-lg-8 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Keterangan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                  <th>Bagian</th>
                                  <th>Keterangan</th>
                                  <th>Update Time</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                  <th>Bagian</th>
                                  <th>Keterangan</th>
                                  <th>Update Time</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr width="50">
                                  <td width="145px">PEMBERKASAN</td>
                                  <td width="335px"><?php
                                    include('keterangan_pemberkasan.php');
                                  ?></td>
                                </tr>
                                <tr>
                                  <td width="145px">VERIFIKASI</td>
                                  <td width="335px"><?php
                                    include('keterangan_verifikasi.php');
                                  ?></td>
                                </tr>
                                <tr>
                                  <td width="145px">ENTRY</td>
                                  <td width="335px"><?php
                                    include('keterangan_entry.php');
                                  ?></td>
                                </tr>  
                            </tbody>
                        </table>
                    </div>
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



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


</body>

</html>
