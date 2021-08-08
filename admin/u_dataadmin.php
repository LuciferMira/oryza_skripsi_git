<?php require_once("head.php");
require_once("../config/koneksi.php"); 
    if(isset($_POST['btn_simpan'])){
  $id = $_POST['id_admin'];
  $gambar = $_POST['gambar'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $tempat = $_POST['tempat_lahir'];
  $tgl = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];
  $tlp = $_POST['telepon'];


  
    $up = mysqli_query($koneksi, "UPDATE admin SET gambar = '$gambar', nama ='$nama', email='$email', tempat_lahir ='$tempat', tanggal_lahir ='$tlg', alamat='$alamat', telepon ='$telepon' where id_admin = '$id'");

    if($up){
      header('location:dataadmin.php?stat=update_berhasil');
    }
      else{
      header('location:dataadmin.php?stat=update_gagal');
      }
  }
?>