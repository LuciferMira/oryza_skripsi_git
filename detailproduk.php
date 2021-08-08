<?php require_once("head.php");
  require_once('config/koneksi.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
 $query =mysqli_query($koneksi, "SELECT * from produk where id='$id'");
 $data = mysqli_fetch_array($query);

}
 ?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero" style="background-color: #967205;">
        <div class="container">
          <div class="breadcrumb-hero" style="background-color: #967205;">
            <h2>Detail Produk</h2>
            <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.php">Beranda</a></li>
          <li><a href="detailproduk.php">Detail Produk</a></li>
          <li>Beras Premium</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img" align="center">
                <div class="col-md-10 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <img src="img/premium.jpg" width="600" height="auto" alt="" class="img-fluid">
              </div>
            </div>
              <h2 class="entry-title">
                <a href="detailproduk.php"><?=$data['nama']?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="index.php">Oryza</a></li>
                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?php echo date('d-M-Y');?></time></a></li>

                </ul>
              </div>

              <div class="entry-content">
            
              <table class="table table-borderless">
              <thead>
                <tr>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Nama</th>
                  <td><?=$data['nama']?></td>
                </tr>
                <tr>
                  <th scope="row">Harga</th>
                  <td><?=$data['harga']?></td>
                </tr>
                <tr>
                  <th scope="row">Berat</th>
                  <td> <div class="col col-md-2"></div>
                                        <div class="col-12 col-md-9">
                                            <select name="selectSm" id="selectSm" class="form-control-sm form-control">
                                                <option value="0">Pilihan</option>
                                                <option value="1">10 kg</option>
                                                <option value="2">25 Kg</option>
                                            </select>
                                       
                </tr>
                <tr>
                  <th scope="row">Stok</th>
                  <td><?=$data['stok']?></td>
                </tr>
                <tr>
                  <th scope="row">Deskripsi</th>
                  <td>
                    <p>
                      <?=$data['deskripsi']?>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
                  <div class="">
                      <a  href="addcart.php?id=<?= $id; ?>" class="btn btn-warning btn-block">
                        <i class="icofont-cart-alt"> </i> Masukan Ke Belanjaanku
                      </a>
                  </div>
                </p>

      

               
              </div>

             

            </article><!-- End blog entry -->

           

          
          </div><!-- End blog entries list -->

         
        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

 <?php require_once("footer.php"); ?>