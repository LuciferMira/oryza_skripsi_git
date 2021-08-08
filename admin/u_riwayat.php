<?php 
require_once("head.php"); 
require_once("../config/koneksi.php");
    
if(isset($_POST['btn_simpan'])){
$id = $_POST['id'];
$tgl = $_POST['tanggal']; 
$gambar = $_POST['gambar']; 
$nama = $_POST['nama_produk']; 
$jml = $_POST['jumlah']; 
$harga = $_POST['harga']; 
$status = $_POST['status_bayar'];
  
  $up = mysqli_query($koneksi, "UPDATE riwayat SET tanggal_masuk = '$btgl', gambar ='$gambar', nama_produk='$nama', jumlah ='$jml', harga ='$harga', status_bayar='$status'where id = '$id'");

    if($up){
      header('location:riwayat.php?stat=update_berhasil');
    }
      else{
      header('location:riwayat.php?stat=update_gagal');
      }
  }
?>