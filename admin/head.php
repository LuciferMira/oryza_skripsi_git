
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ORYZA ADMIN</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../img/logo.png">
    <link rel="shortcut icon" href="../img/logo.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>
<?php
  require_once('../config/koneksi.php');
  //require_once('session_admin.php');
  // if(isset($_POST['masuk'])){
  //   $email = $_POST['email'];
  //   $password = md5($_POST['password']);
  //   $query = mysqli_query($koneksi, "select * from admin where email='$email' and password='$password'");
  //   $num = mysqli_num_rows($query);
  //   $data = mysqli_fetch_array($query);
  //   if($num>0){
  //     session_start();
  //     $_SESSION['gambar'] = $data['gambar'];
  //     $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
  //     $_SESSION['email'] = $data['email'];
  //     $_SESSION['tempat_lahir'] = $data['tempat_lahir'];
  //     $_SESSION['tanggal_lahir'] = $data['tanggal_lahir'];
  //     $_SESSION['alamat'] = $data['alamat'];
  //     $_SESSION['telepon'] = $data['telepon'];
     
  //     header('location:admin.php?stat=login_berhasil');
  //   }else{
  //     // header('location:admin.php?stat=login_gagal');
  //   }
  // }
?>
<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Data</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Komponen</a>
                        <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-puzzle-piece"></i><a href="datauser.php">Data User</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="dataproduk.php">Data Produk</a></li>
                            <li><i class="fa fa-bars"></i><a href="datatransaksi.php">Data Transaksi</a></li>

                            <li><i class="fa fa-id-card-o"></i><a href="dataadmin.php">Data Admin</a></li>
                        </ul>
                    </li>
                  

                    <li class="menu-title">Stok</li><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Barang</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="databarangmasuk.php">Barang Masuk</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="databarangkeluar.php">Barang Keluar</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="datajual.php">Total Penjualan</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="datapendapatan.php">Pendapatan</a></li>
                            <!-- <li><i class="menu-icon ti-themify-logo"></i><a href="datapengeluaran.php">Pengeluaran</a></li> -->


                        </ul>
                    </li>
                    
                    <li class="menu-title">Halaman Admin</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Halaman</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="datariwayat.php">Riwayat Belanja</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="login.php">Logout</a></li>

                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href=""><img src="../img/logo.png" style="width: 40px; height: 40px;" alt="Logo"> ORYZA ADMIN</a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            
        </header>
        <!-- /#header -->
        <!-- Content -->