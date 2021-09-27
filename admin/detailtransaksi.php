<?php
namespace Midtrans;
require_once("head.php");
if(isset($_GET['id'])){
$id= $_GET['id'];
$query = mysqli_query($koneksi, "SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, detail_transaksi.jumlah_beli as qty, subtotal, total, nama_penerima, alamat_penerima, telp_penerima, tanggal_transaksi FROM transaksi
        INNER JOIN user ON user.id = transaksi.id_user
        INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
        INNER JOIN produk ON produk.id = detail_transaksi.id_produk
        LEFT JOIN barang_keluar ON transaksi.id_pesanan = barang_keluar.id_pesanan WHERE transaksi.id_pesanan = $id");
$data = mysqli_fetch_array($query);
require_once dirname(__FILE__) . '/../midtrans-php-master/Midtrans.php';
//Set Your server key
Config::$serverKey = "SB-Mid-server-4uHbo_Y2iqeo4KdL_DMQbt_c";
$status = Transaction::status($data['idp']);
$code = $status->status_code;
if($code=404){
    $stat = "Transaksi Tidak Terdaftar";
}
$setstat = $status->transaction_status;
switch ($setstat) {
  case 'capture':
    $stat = "Pembayaran Lunas dan Terverifikasi";
    break;
  case 'settlement':
    $stat = "Pembayaran Lunas dan Terverifikasi";
    break;
  case 'pending':
    $stat = "Menunggu Proses Pembayaran";
    break;
  case 'deny':
    $stat = "Transaksi Ditolak";
    break;
  case 'cancel':
    $stat = "Transaksi Batal";
    break;
  case 'expire':
    $stat = "Transaksi Melewati Batas Waktu";
    break;
  case 'refund':
    $stat = "Transaksi Batal, Debit Telah Dikembalikan Sepenuhnya";
    break;
  case 'partial_refund':
    $stat = "Transaksi Batal, Debit Telah Dikembalikan Sebagian";
    break;
  case 'authorize':
    $stat = "Transaksi Dalam Proses Verifikasi Oleh Admin";
    break;
  default:
    "Status Transaksi Tidak Diketahui, Mohon Kontak Admin";
    break;
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
                                    <li class="active">Detail Transaksi</li>
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
                                    <div class="col-lg-10">
                                        <h4 class="card-title">Data Transaksi</h4>
                                    </div>
                                </div>
        <hr>
        <div class="form-group">
          <label for="exampleInputEmail1">ID Pesanan</label>
          <input readonly value="<?php echo $data['idp'];?>" type="text" name="id_pesanan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Konsumen</label>
            <input readonly type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['nama_pengguna'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Alamat</label>
          <textarea readonly class="form-control" name="alamat"><?=$data['alamat_penerima']?></textarea>
         </div>
         <div class="form-group">
           <label for="exampleInputEmail1">Telepon</label>
           <input readonly value="<?= $data['telp_penerima'] ?>"type="number" name="telepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
         </div>
         <div class="form-group">
           <label for="exampleInputEmail1">Tanggal Pesanan</label>
           <input readonly value="<?= $data['tanggal_transaksi'] ?>" type="date" name="tgl" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
         </div>
         <div class="form-group">
           <label for="exampleInputEmail1">Status Bayar</label>
           <input readonly value="<?php if($stat==null){ "error"; }else{ echo $stat;} ?>" type="text" name="status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
         </div><hr>
         <div class="row">
          <div class="col-lg-6">
              <h4 class="card-title">Detail Transaksi</h4>
          </div>


          <div class="col-lg-4">
            <form action="cetaksuratjalan.php" method="post">
              <input type="hidden" name="idp" value="<?=$data['idp']?>">
              <select class="form-control" name="data-keluar">
                 <option>--Pilih Tanggal Keluar--</option>
                 <?php
                 $query1 = mysqli_query($koneksi, "SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, detail_transaksi.jumlah_beli as qty,
                        subtotal, total, nama_penerima, alamat_penerima, telp_penerima, tanggal_transaksi, qty_kirim, tanggal_keluar FROM transaksi
                         INNER JOIN user ON user.id = transaksi.id_user
                         INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
                         INNER JOIN produk ON produk.id = detail_transaksi.id_produk
                         LEFT JOIN barang_keluar ON transaksi.id_pesanan = barang_keluar.id_pesanan WHERE transaksi.id_pesanan='$id'");
                 while($d = mysqli_fetch_array($query1)){?>
                   <option value="<?= $d['tanggal_keluar'] ?>"><?= $d['tanggal_keluar']?></option>
                 <?php } ?>
              </select>
          </div>
          <div class="col-lg-2">
               <!-- <a href="cetaktransaksi.php?tgl=" class="btn btn-success btn-block " style="color: white;"><i class="fa fa-print"></i> Cetak</a> -->
               <input type="submit" class="btn btn-success btn-block " style="color: white;" value="Cetak">
          </div>
        </form>
        </div>
         <hr>
         <div class="table-stats order-table ov-h">
             <table class="table ">
                 <thead>
                     <tr>
                         <th class="serial">No</th>
                         <th class="#">ID Barang</th>
                         <th>Nama Barang</th>
                         <th>Jumlah Beli</th>
                         <th>Harga Satuan</th>
                         <th>Subtotal</th>
                         <th>Terkirim</th>
                         <th>Tanggal Kirim</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                         $no = 1;
                         $query = mysqli_query($koneksi, "SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, detail_transaksi.jumlah_beli as qty,
                                subtotal, total, nama_penerima, alamat_penerima, telp_penerima, tanggal_transaksi, qty_kirim, tanggal_keluar FROM transaksi
                                 INNER JOIN user ON user.id = transaksi.id_user
                                 INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
                                 INNER JOIN produk ON produk.id = detail_transaksi.id_produk
                                 LEFT JOIN barang_keluar ON transaksi.id_pesanan = barang_keluar.id_pesanan WHERE transaksi.id_pesanan='$id'");
                         $row = mysqli_num_rows($query);
                         if($row>0){
                         while($data = mysqli_fetch_array($query)){
                     ?>
                     <tr>
                         <td class="serial"><?php echo$no++;?></td>
                         <td><span class="coount"><?=$data['idb'];?></span> </td>
                         <td><span class="name"><?=$data['nama_produk'];?></span> </td>
                         <td><span class="count"><?=$data['qty'];?></span> </td>
                         <td><span class="count"><?=$data['harga_satuan'];?></span></td>
                         <td><span class="name"><?=$data['subtotal'];?></span> </td>
                         <td><span class="count"><?=$data['qty_kirim'];?></span> </td>
                         <td><span class="name"><?=date('d-M-Y',strtotime($data['tanggal_keluar']));?></span> </td>
                         <td>
                           <?php if($data['qty']==$data['qty_kirim']){ ?>
                             <span class="name">Barang Sudah Terkirim</span>
                           <?php }else{ ?>
                           <a href="pengiriman.php?id=<?= $data['idp'] ?>" class="badge badge-warning">Kirim Barang</a>
                           <?php } ?>
                         </td>
                     </tr>
                     <tr>
                       <td colspan="4"></td>
                       <td>Total</td>
                       <td class="count"><?= $data['total'] ?></td>
                       <td></td>
                       <td></td>
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


<?php require_once("footer.php"); ?>
