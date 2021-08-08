<?php require_once("head.php");
 require_once('../config/koneksi.php');

if(isset($_POST['btn_simpan'])){
  $id = $_POST['id_admin'];
 $nama = $_POST['nama'];
  $jumlah = $_POST['jumlah'];
  $total = $_POST['total_bayar'];
  $alamat = $_POST['alamat'];
  $tlp = $_POST['telepon'];


$up = mysqli_query($koneksi, "UPDATE admin SET nama = '$nama', jumlah ='$jumlah', total_bayar ='$total', alamat ='$alamat', telepon ='$tlp' where id_admin = '$id'");

    if($up){
      header('location:dataadmin.php?stat=update_berhasil');
    }
      else{
      header('location:dataadmin.php?stat=update_gagal');
      }
  }
?>