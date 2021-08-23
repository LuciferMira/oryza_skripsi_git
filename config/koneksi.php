<?php

	$server = "localhost";
	$user ="root";
	$pass="";
	$database ="oryza_skripsi";
	$koneksi = mysqli_connect($server, $user, $pass, $database);
	if(!$koneksi){
		echo('maaf gagal melakukan koneksi');

	}

?>
