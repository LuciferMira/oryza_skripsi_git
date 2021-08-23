<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Oryza Admin</title>
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
    <link rel="stylesheet" href="admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>

        <?php
  require_once('config/koneksi.php');
  if(isset($_POST['btn_submit'])){
    $nama = $_POST['nama_pengguna'];
    $tgl_lahir = $_POST['tanggal_lahir'];
    $tempat = $_POST['tempat_lahir'];
    $tlp = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $insert = mysqli_query($koneksi, "INSERT INTO user VALUES('','$nama','$email','$pass','$tempat','$tgl_lahir','$alamat','$tlp')");
    if($insert){
      header('location:daftaruser.php?stat=input_berhasil');
    }else{
      // header('location:daftaruser.php?stat=input_gagal');
    }
  }
?>

<body style="background-color: #e6e6e6;">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="img/logo.png" style="width: 300px; height: 200px;" alt="">
                    </a>
                    <br>
                    <label class="h3">Selamat Datang Di Oryza</label>
                </div>
                <div class="login-form">
                    <form method="POST" action="daftaruser.php">

                        <div class="form-group">
                            <label>Nama pengguna</label>
                            <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama_pengguna">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div> <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                        </div>
                         <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir">
                        </div>
                         <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir">
                        </div>
                         <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" class="form-control" placeholder="Telepon" name="telepon">
                        </div>
                        <div class="checkbox">

                        </div>
                        <button a href="masuk.php" type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="btn_submit">Daftar</button>
                        <a href="masuk.php"></a>
                        <div class="register-link m-t-15 text-center">
                            <p>Sudah Punya Akun ? <a href="masuk.php"> Masuk</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="admin/assets/js/main.js"></script>

</body>
</html>
