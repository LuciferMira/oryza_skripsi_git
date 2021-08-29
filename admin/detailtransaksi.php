<?php
namespace Midtrans;
require_once("head.php");
if(isset($_GET['id'])){
$id= $_GET['id'];
$query = mysqli_query($koneksi, "SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, detail_transaksi.jumlah_beli as qty, subtotal, total, nama_penerima, alamat_penerima, telp_penerima, tanggal_transaksi FROM transaksi
        INNER JOIN user ON user.id = transaksi.id_user
        INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
        INNER JOIN produk ON produk.id = detail_transaksi.id_produk WHERE transaksi.id_pesanan = $id");
$data = mysqli_fetch_array($query);
require_once dirname(__FILE__) . '/../midtrans-php-master/Midtrans.php';
//Set Your server key
Config::$serverKey = "SB-Mid-server-9yJRpPxgIp1Ii_54-vP3g2HO";
$status = Transaction::status($data['idp']);
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
           <input readonly value="<?= $stat ?>" type="text" name="status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
         </div><hr>
         <label for="exampleInputEmail1">Detail Pesanan</label>
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
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                         $no = 1;
                         $query = mysqli_query($koneksi, "SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, detail_transaksi.jumlah_beli as qty,
                                subtotal, total, nama_penerima, alamat_penerima, telp_penerima, tanggal_transaksi, qty_kirim FROM transaksi
                                 INNER JOIN user ON user.id = transaksi.id_user
                                 INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
                                 INNER JOIN produk ON produk.id = detail_transaksi.id_produk WHERE transaksi.id_pesanan='$id'");
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
                         <td><a href="pengiriman.php?id=<?= $data['idp'] ?>" class="badge badge-warning">Kirim Barang</a></td>
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
