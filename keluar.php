<?php
session_start();
if($_SESSION['nama_pengguna']!=null){
	session_destroy();
	header('location:index.php?stat=logout_berhasil');
}
?>