<?php require_once("head.php");
        // <!-- Header-->
     require_once("../config/koneksi.php");
    if(isset($_POST['btn_simpan'])){
  $nama = $_POST['nama'];
  $jumlah = $_POST['jumlah'];
  $total = $_POST['total_bayar'];
  $alamat = $_POST['alamat'];
  $deskripsi = $_POST['telepon'];



      $query =mysqli_query($koneksi,"INSERT INTO transaksi VALUES('$id','$nama','$jumlah','$total','$alamat','$telepon')");
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
                                    <li class="active">Data Transaksi</li>
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
                                        <h4 class="card-title">Data Transaksi</h4>
                                    </div>

                                    <div class="col-lg-4">
                                         <a href="cetaktransaksi.php" class="btn btn-success btn-block " style="color: white;"><i class="fa fa-print"></i> Cetak</a>
                                    </div>

                                </div>

                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <th class="#">ID Pesanan</th>
                                            <th class="#">ID Barang</th>
                                            <th>Nama Konsumen</th>
                                            <th>Jumlah Beli</th>
                                            <th>Total Bayar</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $call = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY id_pesanan");
                                            $row = mysqli_num_rows($call);
                                            if($row>0){
                                                while($data = mysqli_fetch_array($call)){
                                        ?>
                                        <tr>
                                            <td class="serial"><?php echo$no;?></td>
                                            <td><span class="name"><?=$data['id_pesanan'];?></span> </td>
                                            <td><span class="name"><?=$data['id_barang'];?></span> </td>
                                            <td><span class="name"><?=$data['nama'];?></span> </td>
                                            <td><span class="product"><?=$data['jumlah'];?></span> </td>
                                            <td><span class="count"><?=$data['total_bayar'];?></span></td>
                                            <td><span class="name"><?=$data['alamat'];?></span> </td>
                                            <td><span class="name"><?=$data['telepon'];?></span> </td>
                                            <td>
                                              <a href="detailtransaksi.php?id=<?php echo $data['id_pesanan']; ?>" class="badge badge-pending"><i class="fa fa-list"></i> Detail</a>
                                              <a href="edittransaksi.php" class="badge badge-warning"><i class="fa fa-edit"></i> Edit</a>
                                              <a href="dltbrg.php?id=<?=$data['id_barang'];?>" class="badge badge-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        <?php }}else{ ?>
                                            <tr>
                                                <td><span class="count">Tidak Ada Data</span> </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Stripped Table</strong>
                        </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>
