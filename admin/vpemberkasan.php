<?php
	//panggil file config.php untuk menghubung ke server
	include('../config.php');
	session_start();
	$user = $_SESSION['nama_lengkap'];

	$q1 = mysqli_query($connect,"SELECT * FROM referensi WHERE id=1");
  	$q1data = mysqli_fetch_array($q1);
  	$periode = $q1data['periode'];
  	$tahun = $q1data['tahun'];

	//tangkap data dari form
	$jml = $_POST['jml_berkas'];
	$ket = $_POST['keterangan'];

	//simpan data ke database
	$query = mysqli_query($connect,"INSERT INTO pemberkasan VALUES(default, '$jml', '$ket', '$periode', '$tahun',default, '$user')") or die(mysqli_error());
	if ($query) {
	header('location:pemberkasan.php?message=success');
	}
?>