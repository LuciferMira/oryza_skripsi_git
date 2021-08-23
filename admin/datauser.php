<?php require_once("head.php");
        // <!-- Header-->
require_once("../config/koneksi.php");
    if(isset($_POST['btn_simpan'])){
  $barang = $_POST['nama_pengguna'];
  $harga = $_POST['email'];
  $berat = $_POST['tempat_lahir'];
  $stok = $_POST['tanggal_lahir'];
  $deskripsi = $_POST['alamat'];
  $deskripsi = $_POST['telepon'];



      $query =mysqli_query($koneksi,"INSERT INTO user VALUES('$id','$nama_pengguna','$email','$tempat_lahir','$tanggal_lahir','$alamat','$telepon')");
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
                                    <li class="active">Data User</li>
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
                                        <h4 class="card-title">Data User</h4>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="payment.php" class="btn btn-success btn-block " style="color: white;"><i class="fa fa-print"></i> Pay</a>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="cetak.php" class="btn btn-success btn-block " style="color: white;"><i class="fa fa-print"></i> Cetak</a>
                                    </div>

                                </div>

                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <th class="serial">ID</th>
                                            <th class="avatar">Nama Penggguna</th>
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
                                          $tampil = mysqli_query($koneksi, " SELECT * from user");
                                          while($data = mysqli_fetch_array($tampil)) {
                                          ?>


                                          <tr>
                                           <td><?php echo$no;?></td>
                                           <td><?=$data['id']?></td>
                                           <td><?=$data['nama_pengguna']?></td>
                                            <td><?=$data['email']?></td>
                                            <td><?=$data['tempat_lahir']?></td>
                                            <td><?=$data['tanggal_lahir']?></td>
                                            <td><?=$data['alamat']?></td>
                                            <td><?=$data['telepon']?></td>

                                            <td>
              <a href="detailuser.php?id=<?=$data['id'];?>" class="badge badge-pending"><i class="fa fa-list"></i> Detail</a>
              <a href="dltuser.php?id=<?=$data['id'];?>" class="badge badge-warning"><i class="fa fa-trash"></i> Hapus</a>
            </td>
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

                <!-- <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Stripped Table</strong>
                        </div> -->

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>
