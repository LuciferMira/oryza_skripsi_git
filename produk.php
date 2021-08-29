<?php require_once("head.php");
  if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
  }
  if(isset($_GET['kategori'])){
    $kategori=$_GET['kategori'];
    if($kategori=='beras'){
      $judul = ucwords($kategori);
      $query =mysqli_query($koneksi, "SELECT * from produk where kategori='beras'");
      $deskripsi = "Beras adalah bagian bulir padi (gabah) yang telah dipisah dari sekam. Sekam (Jawa merang) secara anatomi disebut 'palea' (bagian yang ditutupi) dan 'lemma' (bagian yang menutupi).
Pada salah satu tahap pemrosesan hasil panen padi, gabah ditumbuk dengan lesung atau digiling sehingga bagian luarnya (kulit gabah) terlepas dari isinya. Bagian isi inilah, yang berwarna putih, kemerahan, ungu, atau bahkan hitam, yang disebut beras.";

    }else{
      $judul = ucwords($kategori);
      $query =mysqli_query($koneksi, "SELECT * from produk where kategori='dedak'");
      $deskripsi = "Ini Dedak";
    }
    // $data =mysqli_fetch_array($query);
  }else{
    $judul = "Produk";
    $query =mysqli_query($koneksi, "SELECT * from produk");
    $deskripsi = "Semua produk";
    // $data =mysqli_fetch_array($query);
  }
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero" style="background-color: #967205;">
        <div class="container">
          <div class="breadcrumb-hero" style="background-color: #967205;">
            <h2><?= $judul; ?>
            </h2>
            <p>
              <?= $deskripsi; ?>
            </p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.php">Beranda</a></li>
          <li>Produk</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
          <?php
          while($data = mysqli_fetch_array($query)) {
          ?>
          <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <article class="entry">

              <div class="entry-img">
                <a href="detailproduk.php?id=<?=$data['id']?>">
                  <img src="admin/images/produk/<?= $data['gambar'] ?>" alt="" class="img-fluid">
                </a>

              </div>

              <h2 class="entry-title">
                <a href="detailproduk.php?id=<?=$data['id']?>"><?=$data['nama']?></a>
              </h2>



              <div class="entry-content">
                <p>Rp. <?= $data['harga'] ?></p>
                <p>
                <?=$data['deskripsi']?>
                </p>
                <div class="read-more">
                  <!-- <a href="detailproduk.php?id=<?=$data['id']?>">Baca Selengkapnya</a> -->
                  <a href="cart.php?id=<?= $data['id'] ?>&action=add">Pesan</a>
                </div>
              </div>

            </article><!-- End blog entry -->
          </div>
  <?php
            }
          ?>


        </div>

        <div class="blog-pagination" data-aos="fade-up">
          <ul class="justify-content-center">
            <li class="disabled"><i class="icofont-rounded-left"></i></li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
          </ul>
        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
<?php require_once("footer.php"); ?>
