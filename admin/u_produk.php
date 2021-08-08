<?php require_once("head.php"); 

require_once("../config/koneksi.php");
    if(isset($_POST['btn_simpan'])){
  $id = $_POST['id'];
  $gambar = $_POST['gambar'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $berat = $_POST['berat'];
  $stok = $_POST['stok'];
  $deskripsi = $_POST['deskripsi'];
  $kategori = $_POST['kategori'];

$up = mysqli_query($koneksi, "UPDATE produk SET gambar = '$gambar', nama ='$nama', harga='$harga', berat ='$berat', stok ='$stok', deskripsi='$deskripsi', kategori ='$kategori' where id = '$id'");

    if($up){
      header('location:dataproduk.php?stat=update_berhasil');
    }
      else{
      header('location:dataproduk.php?stat=update_gagal');
      }
  }
?>