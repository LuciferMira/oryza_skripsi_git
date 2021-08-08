<?php require_once("head.php");
require_once("../config/koneksi.php");
    if(isset($_POST['btn_simpan'])){
  $pesan = $_POST['id_pesanan'];
  $barang = $_POST['id_barang'];
  $nama = $_POST['nama_konsumen'];
  $tgl=$_POST['tanggal_beli'];
  $beli = $_POST['jumlah_beli'];
  $bayar = $_POST['total_bayar'];
  
  
 $up = mysqli_query($koneksi, "UPDATE penjualan SET id_pesanan = '$pesan', id_barang ='$barang', nama_konsumen='$nama', tanggal_beli ='$tgl', jumlah_beli ='$beli', total_bayar='$bayar' where id_pesanan = '$pesan'");

    if($up){
      header('location:databarangkeluar.php?stat=update_berhasil');
    }
      else{
      header('location:databarangkeluar.php?stat=update_gagal');
      }
  }
?>