<?php
	session_start();
	if(isset($_SESSION['nama_pengguna'])){
	  $id = $_SESSION['id'];
      $email = $_SESSION['email'];
      $pass = $_SESSION['password'];
      $t_lahir = $_SESSION['tempat_lahir'];
      $tgl_lahir = $_SESSION['tanggal_lahir'];
      $alamat = $_SESSION['alamat'];
      $tlp = $_SESSION['telepon'];
	}
      // else{
      //       header('location:masuk.php?stat=login_timeout');
      // }
?>
