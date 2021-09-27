<?php require_once("head.php");
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $call = mysqli_query($koneksi, "SELECT id_pesanan,barang_keluar.id,produk.nama as nama_produk,barang_keluar.id_produk as id_produk,tanggal_keluar, jumlah FROM barang_keluar
  INNER JOIN  produk ON produk.id = barang_keluar.id_produk WHERE barang_keluar.id='$id'");
  $data = mysqli_fetch_array($call);
}
?>
        <!-- Header-->
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
                                    <li class="active">Data Barang Keluar</li>
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
                                <strong>Tambah Barang Masuk</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bars"></i></div>
                                        <input class="form-control" type="text" value="<?= $data['nama_produk'] ?>" readonly>
                                    </div>
                                  </div>
                             <div class="form-group">
                                    <label class=" form-control-label">Tanggal Masuk</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="date" name="tanggal" value="<?= $data['tanggal_masuk']?>" readonly>
                                    </div>
                              </div>
                            <div class="form-group">
                                    <label class=" form-control-label">Jumlah</label>
                                     <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-list"></i></div>
                                          <input class="form-control" type="number" name="jumlah" value="<?= $data['jumlah'] ?>" readonly>
                                      </div>
                                </div>
                                <div class="card-footer">
                                    <a href="databarangkeluar.php" class="btn btn-warning" style="color: white;"><i class="fa fa-times"></i> Kembali</a>
                                    <!-- <input type="submit" name="btn_simpan" value="Simpan" class="btn btn-primary"> -->
                                </div>
                        </div>
                    </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>
