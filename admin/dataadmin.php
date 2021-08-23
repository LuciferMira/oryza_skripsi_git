<?php require_once("head.php");
  if(isset($_POST['btn_simpan'])){
    $gambar = $_POST['gambar'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tempat = $_POST['tempat_lahir'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['telepon'];

      $query =mysqli_query($koneksi,"INSERT INTO transaksi VALUES('$id','$gambar','$nama','$email','$tempat_lahir','$tanggal_lahir','$alamat','$telepon')");
        if($query){
          header('location:user.php?status=input_berhasil');
        }else{
          header('location:user.php?status=input_gagal');
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
                                    <li class="active">Data Admin</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">


                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4 class="card-title">Data Admin</h4>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="tambahdataadmin.php" class="btn btn-primary btn-block" style="color: white;"><i class="fa fa-plus"></i> Tambah Data</a>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="cetakadmin.php" class="btn btn-success btn-block" style="color: white;"><i class="fa fa-print"></i> Cetak</a>
                                    </div>

                                </div>

                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Id</th>
                                            <!-- <th class="avatar">Foto</th> -->
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $no=1;
                                          $tampil = mysqli_query($koneksi, " SELECT * from user WHERE akses='admin'");
                                          while($data = mysqli_fetch_array($tampil)) {
                                          ?>
                                          <tr>
                                            <td class="serial">1.</td>
                                            <td><span class="count"><?php echo $data['id']?></span> </td>
                                            <!-- <td class="avatar">
                                                <div class="round-img"><span class="count"><?=$data['gambar'];?></span></td>
                                                    <a href="#"><img class="rounded-circle" src="" alt=""></a>
                                                </div>
                                            </td> -->
                                            <td><span class="name"><?php echo $data['nama_pengguna']?></span> </td>
                                            <td><span class="product"><?php echo $data['email']?></span> </td>
                                            <td><span class="product"><?php echo $data['tempat_lahir']?></span></td>
                                            <td><span class="product"><?php echo $data['tanggal_lahir']?></span></td>
                                            <td><span class="product"><?php echo $data['alamat']?></span></td>
                                            <td><span class="product"><?php echo $data['telepon'];?></span></td>
                                           <td>
                                              <a href="detailadmin.php?id=<?php echo $data['id']; ?>" class="badge badge-pending"><i class="fa fa-list"></i> Detail</a>
                                              <!-- <a href="editadmin.php" class="badge badge-warning"><i class="fa fa-edit"></i> Edit</a> -->
                                              <a href="dltadmin.php?id=<?=$data['id'];?>" class="badge badge-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>

                            </table>
                        </div>
                    </div>
                </div>



        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>
