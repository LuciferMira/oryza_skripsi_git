<?php require_once('../config/koneksi.php');

  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query =mysqli_query($koneksi, " DELETE  from produk where id = '$id' ");
    if($query){
      header('location:dataproduk.php?stat=Hapus_berhasil');
    }else{
      header('location:dataproduk.php?stat=Hapus_gagal');
      }
    }
 ?>