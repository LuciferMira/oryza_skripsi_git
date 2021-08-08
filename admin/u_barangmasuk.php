<?php 
require_once("head.php"); 
require_once("../config/koneksi.php");
    
if(isset($_POST['btn_simpan'])){
  $id = $_POST['id'];
  $barang = $_POST['nama_barang'];
  $berat = $_POST['berat'];
  $tglmsk = $_POST['tanggal_masuk'];
  $jml = $_POST['jumlah'];
  $harga = $_POST['harga'];
  $total = $_POST['total_bayar'];


  
  $up = mysqli_query($koneksi, "UPDATE barang_masuk SET nama_barang = '$barang', berat ='$berat', tanggal_masuk='$tglmsk', jumlah ='$jml', harga ='$harga', total_bayar='$total'where id = '$id'");

    if($up){
      header('location:databarangmasuk.php?stat=update_berhasil');
    }
      else{
      header('location:databarangmasuk.php?stat=update_gagal');
      }
  }
?>