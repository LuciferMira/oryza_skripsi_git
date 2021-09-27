<?php
namespace Midtrans;
require_once("head.php");
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero" style="background-color: #967205;">
        <div class="container">
          <div class="breadcrumb-hero" style="background-color: #967205;">
            <h2>Riwayat Belanja</h2>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.php">Beranda</a></li>
          <!-- <li><a href="detailproduk.php">Detail Produk</a></li> -->
          <li>Riwayat Belanja</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-12 entries">

            <article class="entry entry-single">

              <table class="table">
                <thead class="table-light">
                    <th>No</th>
                    <th>Id</th>
                    <th>Tanggal</th>
                    <!-- <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th> -->
                    <th>Total Transaksi</th>
                    <th>Alamat Pengiriman</th>
                    <th>Status Bayar</th>
                    <!-- <th>Aksi</th> -->


                </thead>
                <tbody>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, detail_transaksi.jumlah_beli as qty, subtotal, total, nama_penerima, alamat_penerima, telp_penerima, tanggal_transaksi FROM transaksi
                    INNER JOIN user ON user.id = transaksi.id_user
                    INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
                    INNER JOIN produk ON produk.id = detail_transaksi.id_produk WHERE id_user = $id");
            while($row = mysqli_fetch_array($query)){
              if($row!=0){
                require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';
                //Set Your server key
                Config::$serverKey = "SB-Mid-server-4uHbo_Y2iqeo4KdL_DMQbt_c";
                $status = Transaction::status($row['idp']);
                $setstat = $status->transaction_status;
                $code = $status->status_code;
                if($code=404){
                    $stat = "Transaksi Tidak Terdaftar";
                }
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
                    "Transaksi Tidak Terdaftar";
                    break;
                }
                ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['idp']; ?></td>
                  <td><?php echo $row['tanggal_transaksi']; ?></td>
                  <!-- <td><?php echo $row['nama_produk']; ?></td>
                  <td><?php echo $row['qty']; ?></td>
                  <td><?php echo $row['harga_satuan']; ?></td> -->
                  <td><?= $row['total'] ?></td>
                  <td><?php echo $row['alamat_penerima']; ?></td>
                  <td><?php if($stat==null){ "error"; }else{ echo $stat;} ?></td>
                  <!--<td><?php echo $code; ?></td>-->
                  <!-- <td>
                    <a href="dltcart.php" class="btn btn-danger">
                      <i class="icofont-trash"></i>
                    </a>
                  </td> -->
                </tr>
              <?php }else{ ?>
                <tr>
                  <td colspan="10" class="text-center">Tidak ada riwayat pembelanjaan</td>
                </tr>
              <?php } } ?>
              </tbody>

              </table>

            </article><!-- End blog entry -->




          </div><!-- End blog entries list -->

          <!-- <div class="col-lg-4"> -->
            <!-- <div class="sidebar"> -->
            <!--   <div class="sidebar-item recent-posts">
              <h3>Ringkasan Belanja</h3>
              <hr>
              <h6>Total Harga (1 Barang)</h6>

              <hr>

              <td> Total</td> -->
 <!-- <a href="" class="btn btn-warning btn-block"> -->
                        <!-- <i class="icofont-bill-alt" href="cart.com"> </i> Bayar -->
                      <!-- </a> -->

              <!-- </div> End sidebar recent posts -->
            <!-- </div>End sidebar -->

          <!-- </div>End blog sidebar -->

        <!-- </div> -->

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

 <?php require_once("footer.php"); ?>
