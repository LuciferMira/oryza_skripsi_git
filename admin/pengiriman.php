<?php require_once("head.php");
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = mysqli_query($koneksi, "SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, detail_transaksi.jumlah_beli as qty,
    subtotal, total, nama_penerima, alamat_penerima, telp_penerima, tanggal_transaksi, stok FROM transaksi
          INNER JOIN user ON user.id = transaksi.id_user
          INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
          INNER JOIN produk ON produk.id = detail_transaksi.id_produk WHERE transaksi.id_pesanan = $id");
  $data = mysqli_fetch_array($query);
  if($data['qty']>$data['stok']){
    $max = $data['stok'];
  }else{
    $max = $data['qty'];
  }
}


if(isset($_POST['btn_simpan'])){
  $idpesanan = $_POST['idp'];
  $idproduk = $_POST['idb'];
  $tgl_keluar = $_POST['tgl'];
  $jml = $_POST['jml'];
  $query = mysqli_query($koneksi, "INSERT INTO barang_keluar VALUES(null,'$idpesanan','$idproduk','$tgl_keluar','$jml')");
  if($query){
    $up = mysqli_query($koneksi, "UPDATE detail_transaksi SET qty_kirim = '$jml' WHERE id_pesanan = '$idpesanan'");

    $select = mysqli_query($koneksi, "SELECT id,stok FROM produk WHERE id='$idproduk'");
    $dstok = mysqli_fetch_array($select);
    $nstok = $dstok['stok'] - $jumlah;
    $up = mysqli_query($koneksi, "UPDATE produk SET stok = '$nstok' WHERE id = '$idproduk'");
    if($up){
      header('location:databarangkeluar.php?stat=input_berhasil');
    }else{
      header('location:databarangkeluar.php?stat=input_gagal');
    }
  }else{
    header('location:databarangkeluar.php?stat=input_gagal');
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
                                <strong>Pengiriman Barang</strong>
                            </div>
                            <div class="card-body card-block">
                              <form action="" method="post">
                                <div class="form-group">
                                       <label class=" form-control-label">ID Pesanan</label>
                                       <div class="input-group">
                                         <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                             <input class="form-control" type="text" name="idp" value="<?=$data['idp']?>" readonly>
                                       </div>
                               </div>
                                <div class="form-group">
                                       <label class=" form-control-label">ID Barang</label>
                                       <div class="input-group">
                                         <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                             <input class="form-control" type="text" name="idb" value="<?=$data['idb']?>" readonly>
                                       </div>
                               </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Barang</label>
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input class="form-control" type="text" name="namab" value="<?=$data['nama_produk']?>" readonly>
                                    </div>
                                </div>
                             <div class="form-group">
                                    <label class=" form-control-label">Tanggal Keluar</label>
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input class="form-control" type="date" name="tgl">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class=" form-control-label">Jumlah</label>
                                     <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-list"></i></div>
                                          <input class="form-control" type="number" name="jml" min="1" max="<?=$max?>">
                                     </div>
                            </div>
                                <div class="card-footer">
                                    <a href="detailtransaksi.php?id=<?= $data['idp'] ?>" class="btn btn-warning" style="color: white;"><i class="fa fa-times"></i> Kembali</a>
                                    <input type="submit" name="btn_simpan" value="Simpan" class="btn btn-primary">
                                </div>
                              </form>
                        </div>
                    </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>
