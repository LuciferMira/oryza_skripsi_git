<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <?php require_once('config/koneksi.php');
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $login = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$pass'");
    $row = mysqli_num_rows($login);
    if($row>0){
      $data = mysqli_fetch_array($login);
      $akses = $data['akses'];
      session_start();
      $_SESSION['idusr'] = $data['id_user'];
      $_SESSION['nama'] = $data['nama_pengguna'];
      $_SESSION['tgl'] = $data['tanggal_lahir'];
      $_SESSION['tmpt'] = $data['tempat_lahir'];
      $_SESSION['add'] = $data['alamat'];
      $_SESSION['mail'] = $data['email'];
      $_SESSION['no'] = $data['telepon'];
      $_SESSION['akses'] = $data['akses'];
      if($akses=='admin'){
        header('location:admin/index.php?stat=login_success');
      }elseif($akses=='user'){
        header('location:index.php?stat=login_success');
      }else{
        header('location:error.php');
      }
    }else{
      header('location:masuk.php?stat=login_failed');
    }
  }
  ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ORYZA LOGIN</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="img/logo.png">
    <link rel="shortcut icon" href="img/logo.png">

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
<body style="background-color: #e6e6e6;">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="img/logo.png" style="width: 300px; height: 200px;" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Nama Pengguna</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <!-- <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Lupa Kata Sandi?</a>
                            </label>

                        </div> -->
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login">Masuk</button>
                        <br><br>
                        <a class="btn btn-danger btn-flat m-b-30 m-t-30" href="index.php">Kembali</a>
                        <br><br>
                        <!-- <a class="btn btn-success btn-flat m-b-30 m-t-30" href="index.php">Masuk</a> -->
                        <div class="register-link m-t-15 text-center">
                            <p>Tidak punya akun ? <a href="daftaruser.php"> Daftar disini</a></p>
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
    <script src="assets/js/main.js"></script>

</body>
</html>
