<?php
  include('../config.php');
  $q1 = mysqli_query($connect,"SELECT * FROM referensi WHERE id=1");
  $q2 = mysqli_query($connect,"SELECT * FROM info WHERE id=1");
  $q1data = mysqli_fetch_array($q1);
  $q2data = mysqli_fetch_array($q2);
  $periode = $q1data['periode'];
  $tahun = $q1data['tahun'];

  $qverifikasi = mysqli_query($connect,"SELECT SUM(jml_berkas) AS total FROM verifikasi WHERE periode='$periode' AND tahun='$tahun'");
  $totaldataverifikasi= mysqli_fetch_array($qverifikasi);

  $totalverifikasi = $totaldataverifikasi['total'];

  $qentry = mysqli_query($connect,"SELECT SUM(jml_berkas) AS total FROM entry WHERE periode='$periode' AND tahun='$tahun'");
  $totaldataentry= mysqli_fetch_array($qentry);

  $totalentry = $totaldataentry['total'];

?>
<div class="row no-gutters align-items-center">
  <div class="col mr-2">
    <div class="text-xs font-weight-bold text-default text-uppercase mb-1">Jumlah Entry Periode <?php
        echo($periode.' '.$tahun);
    ?></div>
    <div class="row no-gutters align-items-center">
      <div class="col-auto">
        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
          //Menampilkan total pemberkasan
          if(empty($totalentry)){
            echo('0');
          }else{
            echo($totalentry);
          }
        ?>/<?php
          //menampilkan total Berkas
          if(empty($totalverifikasi)){
            echo('0 <small>Berkas</small>');
          }else{
            echo($totalverifikasi.' <small>Berkas</small>');
          }
        ?></div>
      </div>
    </div>
  </div>
  <div class="col-auto">
    <i class="fas fa-upload fa-2x text-gray-300"></i>
  </div>
</div>