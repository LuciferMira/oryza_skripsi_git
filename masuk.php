
<?php
  require_once('config/koneksi.php');
  // require_once('head.php');

  if(isset($_POST['masuk'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($koneksi, "select * from user where email='$email'");
    $num = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);
    if($num>0){
      session_start();
      $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
      $_SESSION['email'] = $data['email'];
      $_SESSION['password'] = $data['password'];
      $_SESSION['tempat_lahir'] = $data['tempat_lahir'];
      $_SESSION['tanggal_lahir'] = $data['tanggal_lahir'];
      $_SESSION['alamat'] = $data['alamat'];
      $_SESSION['telepon'] = $data['telepon'];
     
      header('location:index.php?stat=login_berhasil');
    }else{
      header('location:index.php?stat=login_gagal');
    }
  }
?>


</head>
<body style="background-color: #e6e6e6;">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="img/logo.png" style="width: 300px; height: 200px;" alt="">
                    </a>
                    <br>
                    <label class="h3">Selamat Datang Di Oryza</label>
                </div>
                <div class="login-form">
                    <form action="masuk.php" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="checkbox">
                                
                            </div>
                            <input type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="masuk" value="Masuk">
                        
                        <div class="register-link m-t-15 text-center">
                            <p>Belum Punya Akun ? <a href="daftaruser.php"> Daftar</a></p>
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
