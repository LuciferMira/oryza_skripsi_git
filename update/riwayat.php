<?php require_once("head.php"); ?>

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
                    <th>Id</th>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Alamat</th>
                    <th>Status Bayar</th>
                    <th>Aksi</th>


                </thead>
                <tbody>
                  <?php
            //initialize total
            $total = 0;
                        $_SESSION['total']=$total;
            if(!empty($_SESSION['cart'])){
            //create array of initail qty which is 1
            $index = 0;
            if(!isset($_SESSION['qty_array'])){
              $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
            }
            $sql = "SELECT * FROM riwayat WHERE id IN (".implode(',',$_SESSION['cart']).")";
            $query = mysqli_query($koneksi,$sql);
              while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                  <td>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                    </label>
                  </div>
                </td>
                  <!-- <td>
                    <a href="dltcart.php?id=<?php echo $row['id_produk']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                  </td> -->
                  <td><?php echo $row['id_transaksi']; ?></td>
                  <td><?php echo $row['tanggal']; ?></td>
                  <td><?php echo $row['gambar']; ?></td>
                  <td><?php echo $row['nama_produk']; ?></td>
                  <td><?php echo $row['jumlah']; ?></td>
                  <td><?php echo $row['harga']; ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td><?php echo $row['status_bayar']; ?></td>


                  <td>
                    <div class="col-lg-6">
                    <input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>">  
                    </div>
                    
                  </td>
                  <td><?php echo number_format($row['harga'], 2); ?></td>
                  <td>
                    <a href="dltcart.php" class="btn btn-danger">
                      <i class="icofont-trash"></i>
                    </a>
                  </td>

                  <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                  <!-- <td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td> -->
                  <!-- <td><?php echo number_format($_SESSION['qty_array'][$index]*$row['harga'], 2); ?></td>
                  <?php $total += $_SESSION['qty_array'][$index]*$row['harga']; ?> -->
                </tr>
                <?php
                $index ++;
              }
            }
            else{
              ?>
              <tr>
                <td colspan="10" class="text-center">Tidak ada riwayat pembelanjaan</td>
              </tr>
              <?php
            }
 
          ?>
         <!--  <tr>
            <td colspan="12" align="right"><b>Total</b></td>
            <td><b><?php echo number_format($total, 2); ?></b></td>
          </tr> -->
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