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
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $query = mysqli_query($koneksi, "SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, detail_transaksi.jumlah_beli as qty, subtotal, total, nama_penerima, alamat_penerima, telp_penerima, tanggal_transaksi FROM transaksi
                                                    INNER JOIN user ON user.id = transaksi.id_user
                                                    INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
                                                    INNER JOIN produk ON produk.id = detail_transaksi.id_produk GROUP BY transaksi.id_pesanan ORDER BY transaksi.id_pesanan DESC");
                                            $row = mysqli_num_rows($query);
                                            if($row>0){
                                            while($data = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td class="serial"><?php echo$no++;?></td>
                                            <td><span class="count"><?=$data['idp'];?></span> </td>
                                            <td><span class="coount"><?=$data['idb'];?></span> </td>
                                            <td><span class="name"><?=$data['nama_pengguna'];?></span> </td>
                                            <td><span class="count"><?=$data['qty'];?></span> </td>
                                            <td><span class="count"><?=$data['total'];?></span></td>
                                            <td><span class="name"><?=$data['alamat_penerima'];?></span> </td>
                                            <td><span class="name"><?= date('d-M-Y',strtotime($data['tanggal_transaksi']));?></span> </td>
                                            <td>
                                              <a href="detailtransaksi.php?id=<?php echo $data['idp']; ?>" class="badge badge-pending"><i class="fa fa-list"></i> Detail</a>
                                              <!-- <a href="edittransaksi.php" class="badge badge-warning"><i class="fa fa-edit"></i> Edit</a> -->
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
