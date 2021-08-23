<?php require_once("head.php");

if(isset($_POST['btn_simpan'])){
  $produk = $_POST['produk'];
  $tgl = $_POST['tanggal'];
  $jumlah = $_POST['jumlah'];
  $query = mysqli_query($koneksi, "INSERT INTO barang_masuk VALUES('','$produk','$tgl','$jumlah')");
  if($query){
    $select = mysqli_query($koneksi, "SELECT id,stok FROM produk WHERE id='$produk'");
    $dstok = mysqli_fetch_array($select);
    $nstok = $dstok['stok'] + $jumlah;
    $up = mysqli_query($koneksi, "UPDATE produk SET stok = '$nstok' WHERE id = '$produk'");
    if($up){
      header('location:databarangmasuk.php?stat=input_berhasil');
    }else{
      header('location:databarangmasuk.php?stat=input_gagal');
    }
  }else{
    header('location:databarangmasuk.php?stat=input_gagal');
  }
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
                                <strong>Tambah Barang Masuk</strong>
                            </div>
                            <div class="card-body card-block">
                              <form action="" method="post">
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bars"></i></div>
                                        <!-- <input class="form-control" type="text"> -->
                                        <select class="form-control" name="produk">
                                          <option value="">--Pilih Produk--</option>
                                          <?php $call = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id ASC");
                                          while($data = mysqli_fetch_array($call)){ ?>
                                          <option value="<?= $data['id'] ?>"><?= $data['nama'] ?> | <?= $data['berat'] ?> KG</option>
                                        <?php } ?>
                                        </select>
                                    </div>
                             <div class="form-group">
                                    <label class=" form-control-label">Tanggal Masuk</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="date" name="tanggal">
                                    </div>
                            <div class="form-group">
                                    <label class=" form-control-label">Jumlah</label>
                                     <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-list"></i></div>
                                          <input class="form-control" type="number" name="jumlah">
                                      </div>
                                </div>
                                <div class="card-footer">
                                    <a href="databarangmasuk.php" class="btn btn-warning" style="color: white;"><i class="fa fa-times"></i> Kembali</a>
                                    <input type="submit" name="btn_simpan" value="Simpan" class="btn btn-primary">
                                </div>
                              </form>
                        </div>
                    </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>
