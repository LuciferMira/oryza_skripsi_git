<?php
session_start();
	if(isset($_SESSION['akses']) && $_SESSION['akses']=='admin'){
	  	$id = $_SESSION['idusr'];
			$namausr = $_SESSION['nama'];
      $email = $_SESSION['mail'];
      $t_lahir = $_SESSION['tmpt'];
      $tgl_lahir = $_SESSION['tgl'];
      $alamat = $_SESSION['add'];
      $tlp = $_SESSION['no'];
	}else{
		header('location:../masuk.php?stat=login_timeout');
	}
?>
