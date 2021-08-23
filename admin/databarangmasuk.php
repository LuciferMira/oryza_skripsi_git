<?php require_once("head.php"); ?>
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
                                    <li class="active">Barang Masuk</li>
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
                                        <h4 class="card-title">Data Barang Masuk</h4>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="tdmasuk.php" class="btn btn-primary btn-block" style="color: white;"><i class="fa fa-plus"></i> Tambah Data</a>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="cetakmasuk.php" class="btn btn-success btn-block" style="color: white;"><i class="fa fa-print"></i> Cetak</a>
                                    </div>

                                </div>

                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <!-- <th>Id Barang</th> -->
                                            <th>Nama Barang</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Jumlah/Qty</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $no = 1;
                                            $call = mysqli_query($koneksi, "SELECT barang_masuk.id,produk.nama as nama_produk,barang_masuk.id_produk as id_produk,tanggal_masuk, jumlah FROM barang_masuk
                                            INNER JOIN  produk ON produk.id = barang_masuk.id_produk ORDER BY tanggal_masuk ASC");
                                            if(mysqli_num_rows($call)==0){?>
                                              <tr>
                                                  <td class="serial" colspan="5"><center>Tidak Ada Data</center></td>
                                              </tr>
                                      <?php }else{
                                        while($data = mysqli_fetch_array($call)){
                                    ?>
                                    <tr>
                                        <td class="serial"><?= $no++ ?></td>
                                        <!-- <td><?= $data['id_produk'] ?></td> -->
                                        <td><span class="name"><?php echo $data['nama_produk']?></span></td>
                                        <td><span class="name"><?php echo $data['tanggal_masuk']?></span></td>
                                        <td><span class="count"><?php echo $data['jumlah']?></span></td>
                                        <td>
                                          <a href="detailmasuk.php?id=<?php echo $data['id']; ?>" class="badge badge-pending"><i class="fa fa-list"></i> Detail</a>
                                        </td>
                                    </tr>
                                  <?php } }?>
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
<?php require_once("footer.php");
?>
