<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ORYZA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Serenity - v2.2.1
  * Template URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php 

  require_once('config/koneksi.php'); 
  require_once('session.php');
  //require_once('session.php');
  // if(isset($_POST['masuk'])){
  //   $email = $_POST['email'];
  //   $password = md5($_POST['password']);
  //   $query = mysqli_query($koneksi, "select * from user where email='$email' and password='$password'");
  //   $num = mysqli_num_rows($query);
  //   $data = mysqli_fetch_array($query);
  //   if($num>0){
  //     session_start();
  //     $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
  //     $_SESSION['email'] = $data['email'];
  //     $_SESSION['password'] = $data['password'];
  //     $_SESSION['tempat_lahir'] = $data['tempat_lahir'];
  //     $_SESSION['tanggal_lahir'] = $data['tanggal_lahir'];
  //     $_SESSION['alamat'] = $data['alamat'];
  //     $_SESSION['telepon'] = $data['telepon'];
     
  //     header('location:home.php?stat=login_berhasil');
  //   }else{
  //     // header('location:admin.php?stat=login_gagal');
  //   }
  // }
?>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="background-color: #f9cf37;">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" href="index.php" style="width: 50px; height: 50px;">
        <label class="" style="font-size: 20px; color: black;">ORYZA</label>

        <!-- <h1 class="text-light">
          <img src="img/logo.png" href="index.php" style="width: 50px; height: 50px;"> ORYZA</a>
        </h1> -->
      </a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
    </div>



      <nav class="nav-menu d-none d-lg-block">
        <ul>

          <li class="active"><a href="index.php">Beranda</a></li>

          <li class="drop-down"><a href="">Produk</a>
            <ul>
              <li><a href="produk.php">Semua Produk</a></li>
              <li><a href="produk.php?kategori=beras">Beras</a></li>
              <li><a href="produk.php?kategori=dedak">Dedak Padi</a></li>
            </ul>
          </li>

          <li><a href="proses.php">Proses</a></li>
          <li><a href="tentang.php">Tentang</a></li>
          <li>
            <a href="cart.php">
              <i class="icofont-cart"></i> Belanjaanku</a>
            <li>  
              <a href="riwayat.php">
              <i class="icofont-ui-note"></i> Riwayat Belanja</a>
            </li>
          </li>
          <?php if(isset($_SESSION['nama_pengguna'])){?>
          <li class="get-started"><a href="keluar.php">Keluar</a></li>
          <?php }else{ ?>
          <li class="get-started"><a href="masuk.php">Masuk</a></li>
          <?php } ?>
        
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
