<?php
    include('../config.php');

    $periode = $_POST['periodecb'];
    $tahun   = $_POST['tahun'];
    $jml 	 = $_POST['jml_pasien'];
    
    $query = mysqli_query($connect,"UPDATE referensi SET periode='$periode',tahun='$tahun',jml_pasien='$jml' WHERE id='1'");
    if ($query) {
        header('location:referensi.php?message=success');
    }
?>