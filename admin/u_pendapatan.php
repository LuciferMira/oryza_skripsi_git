<?php require_once("head.php");
require_once("../config/koneksi.php");
    if(isset($_POST['btn_simpan'])){
  $id = $_POST['id_barang'];
  $barang = $_POST['nama_barang'];
  $Kategori = $_POST['Kategori'];
  $tglklr = $_POST['tanggal_keluar'];
  $berat =$_POST['berat'];
  $jml = $_POST['jumlah'];
  $harga = $_POST['harga'];

  
 $up = mysqli_query($koneksi, "UPDATE barang_keluar SET nama_barang = '$barang', kategori ='$kategori', tanggal_keluar='$tglklr', berat ='$berat', jumlah ='$jml', harga='$harga' where id_barang = '$id'");

    if($up){
      header('location:databarangkeluar.php?stat=update_berhasil');
    }
      else{
      header('location:databarangkeluar.php?stat=update_gagal');
      }
  }
?>