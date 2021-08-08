<?php require_once('../config/koneksi.php');

  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query =mysqli_query($koneksi, " DELETE  from riwayat where id_transaksi = '$id' ");
    if($query){
      header('location:datariwayat.php?stat=Hapus_berhasil');
    }else{
      header('location:datariwayat.php?stat=Hapus_gagal');
      }
    }
 ?>