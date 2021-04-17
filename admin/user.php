<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  $_SESSION['menu']='user';
 
 //agar tidak bisa di akses jika tidak login
  if (empty($_SESSION['username'])) {
  header('location:../');
  }
  include('../config.php');
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User Claim Covid 19 - RSIH</title>

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
            <h1 class="h3 mb-2 text-gray-800">User</h1>
            <a href="#tambah_pemberkasan" class="btn btn-sm btn-success" id="CustId" data-toggle="modal"><i class="fas fa-upload fa-sm text-white-50"></i> Tambah User</a>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Data Pemberkasan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Bagian</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Bagian</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $level=$_SESSION['level'];
                      //membuat query membaca record dari tabel User      
                      $query="SELECT * FROM user WHERE level='$level'";
                      //menjalankan query      
                      if (mysqli_query($connect,$query)) {      
                        $result=mysqli_query($connect,$query);     
                      } else die ("Error menjalankan query". mysql_error());
                      //mengecek record kosong     
                      if (mysqli_num_rows($result) > 0) {
                        $no='1';
                        //menampilkan hasil query      
                        while($row = mysqli_fetch_array($result)) {      
                          echo "<tr>";
                          echo "  <td>".$no."</td>";    
                          echo "  <td>".$row["nama_lengkap"]."</td>";
                          echo "  <td>".$row["username"]."</td>";      
                          echo "  <td>".$row["bagian"]."</td>";
                          // echo "<td width='14%' align='center'> <a href='../$row[files]' class='btn btn-sm btn-primary'> <i class='glyphicon glyphicon-floppy-save'></i></a>";
                          // echo " <a href='#accModal' class='btn btn-sm btn-success' id='CustId' data-toggle='modal' data-id=".$row['id']."><i class='glyphicon glyphicon-ok'></i> </a> ";
                          // echo " <a href='#myModal' class='btn btn-sm btn-danger' id='CustId' data-toggle='modal' data-id=".$row['id']."><i class='glyphicon glyphicon-remove'></i> </a></td>";  
                          echo "</tr>";   
                          $no++;
                        }    
                      }
                    ?>
                  </tbody>
                </table>
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
              <input required type="text" name="username" class="form-control" placeholder="Username..." maxlength="6">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input required type="password" name="password" class="form-control" placeholder="Password..." maxlength="6">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input required type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap..." maxlength="255">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input required type="text" name="bagian" class="form-control" placeholder="Bagian..." maxlength="6">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
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
