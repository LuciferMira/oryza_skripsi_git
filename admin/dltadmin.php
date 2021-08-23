<?php require_once('../config/koneksi.php');

  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query =mysqli_query($koneksi, "DELETE FROM user WHERE id = '$id'");
    if($query){
      header('location:dataadmin.php?stat=hapus_berhasil');
    }else{
      header('location:dataadmin.php?stat=hapus_gagal');
      }
    }
 ?>
