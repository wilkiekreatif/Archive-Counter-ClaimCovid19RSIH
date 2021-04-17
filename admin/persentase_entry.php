<?php
//menampilkan angka
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
    <div class="text-xs font-weight-bold text-default text-uppercase mb-1">Persentase Entry </div>
    <div class="row no-gutters align-items-center">
      <div class="col-auto">
        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
          if(empty($totalentry)){
            echo('0.00');
          }else{
            $persentase = ($totalentry/$totalverifikasi)*100;
            $angka_format = number_format($persentase,2);
            echo($angka_format);
          }
        ?>%</div>
      </div>
      <div class="col">
        <div class="progress progress-sm mr-2">
          <div class="progress-bar bg-danger" role="progressbar" style=<?php
            if(empty($totalentry)){
              echo('"width: 0%"');
            }else{
              echo('"width: '.$angka_format.'%"');}
          ?> aria-valuenow=<?php
            if(empty($totalentry)){
              echo('"width: 0%"');
            }else{
              echo('"width: '.$angka_format.'%"');}
          ?> aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-auto">
    <i class="fas fa-upload fa-2x text-gray-300"></i>
  </div>
</div>