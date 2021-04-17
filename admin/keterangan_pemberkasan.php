<?php
//menampilkan angka
  include('../config.php');
  $q1 = mysqli_query($connect,"SELECT * FROM referensi WHERE id=1");
  $q2 = mysqli_query($connect,"SELECT * FROM info WHERE id=1");
  $q1data = mysqli_fetch_array($q1);
  $q2data = mysqli_fetch_array($q2);
  $periode = $q1data['periode'];
  $tahun = $q1data['tahun'];

  $qtotal = mysqli_query($connect,"SELECT SUM(jml_berkas) AS total FROM pemberkasan WHERE periode='$periode' AND tahun='$tahun'");
  $totaldata= mysqli_fetch_array($qtotal);
  $total = $totaldata['total'];

  $qket = mysqli_query($connect,"SELECT * FROM pemberkasan WHERE periode='$periode' AND tahun='$tahun'ORDER BY id DESC LIMIT 1");
  $keterangan= mysqli_fetch_array($qket);
?>
<?php
  //menampilkan total Berkas
  echo($keterangan['keterangan']);
  echo('</td><td>'.$keterangan['tgl_input']);
?>