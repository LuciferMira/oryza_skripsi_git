<?php require_once("head.php");
if(isset($_GET['id'])){
 $query =mysqli_query($koneksi, "SELECT * from produk where id='$'");
}
 ?>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero" style="background-color: #967205;">
        <div class="container">
          <div class="breadcrumb-hero" style="background-color: #967205;">
            <h2>Detail Produk</h2>
            <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li><a href="detailproduk.php">Beras</a></li>
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

              <div class="entry-img">
                <img src="assets/img/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">Beras Organik</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">Oryza</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">April 1, 2021</time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>
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
                  <td><?php echo $data['berat'].'Kg'; ?>/Karung</td>
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
                      <a  href="cart.php" class="btn btn-warning btn-block">
                        <i class="icofont-cart-alt"> </i> Beli
                      </a>
                  </div>
                </p>

      

               
              </div>

             

            </article><!-- End blog entry -->

           

          
          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

      

            
              <h3 class="sidebar-title">Terakhir Dilihat</h3>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="assets/img/blog-recent-1.jpg" alt="">
                  <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>


              </div><!-- End sidebar recent posts-->

            

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

 <?php require_once("footer.php"); ?>