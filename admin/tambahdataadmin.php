<?php require_once("head.php");
  if(isset($_POST['btn_simpan'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tmpt = $_POST['tempat_lahir'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['telepon'];
    $password = MD5($_POST['password']);

    $query = mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$email','$password','$tmpt','$tgl','$alamat','$tlp','admin')");
    if($query){
      header('location:dataadmin.php?stat=input_berhasil');
    }else{
      header('location:dataadmin.php?stat=input_gagal');
    }
  }
?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li class="active">Data Transaksi</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content">
            <div class="animated fadeIn">

         <div class="col-xs-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Tambah Data Admin</strong>
                            </div>
                            <div class="card-body card-block">
                              <form action="" method="post">
                                <!-- <div class="form-group">
                                    <label class=" form-control-label">ID</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-picture-o"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <small class="form-text text-muted">ex. 99/99/9999</small>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label class=" form-control-label">Gambar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input class="form-control" type="file">
                                    </div>
                                    <small class="form-text text-muted">ex. (999) 999-9999</small>
                                </div> -->
                                <div class="form-group">
                                    <label class=" form-control-label">Nama</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                                        <input class="form-control" type="text" name="nama">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 99-9999999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input class="form-control" type="email" name="email">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                                </div>
                               <div class="form-group">
                                    <label class=" form-control-label">Tempat Lahir</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                        <input class="form-control" type="text" name="tempat_lahir">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. ~9.99 ~9.99 999</small> -->
                             <div class="form-group">
                                    <label class=" form-control-label">Tanggal Lahir</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="date" name="tanggal_lahir">
                                    </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Alamat</label>
                                   <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <!-- <input class="form-control"> -->
                                        <textarea name="alamat" rows="2" cols="80" class="form-control"></textarea>
                                    </div>
                                     <div class="form-group">
                                    <label class=" form-control-label">Telepon</label>
                                   <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input class="form-control" type="text" name="telepon">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="dataadmin.php" class="btn btn-warning" style="color: white;"><i class="fa fa-times"></i> Kembali</a>
                                <input type="submit" name="btn_simpan" value="Simpan" class="btn btn-primary">
                            </div>
                          </form>
                        </div>
                    </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>
