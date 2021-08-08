<?php 
  require_once('head.php');
  require_once('koneksi.php');
  ?>
        <?php
          $no=1;
          $tampil = mysqli_query($koneksi, " SELECT * from barang");
          while($data = mysqli_fetch_array($tampil)) {
          ?>
          

  <!-- Page Content -->
  <div class="container">
    <h1 class="my-4" style="text-align: center">Produk</h1>
    <hr>
    <div class="row">
      <div class="col-lg-4">
        <div class="card h-100">
          <div class="card-body">
            <img class="card-img-top" src="../../img/Pandan wangi.jpg" width="250px" height="300px" alt="">
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card h-100">
          <div class="card-header">
            <small>Detail Produk</small>
          </div>
          <div class="card-body">
            <table class="table table-borderless">
              <thead>
                <tr>
                  
                </tr>
              </thead>
              <tbody>     
          <tr>
           <?php echo$no;?>
           <?=$data['id_barang']?>
            <?=$data['nama_barang']?>
            <?=$data['harga']?>
            <?=$data['berat_satuan']."Kg"?>
            <?=$data['stok']?>
            <?=$data['deskripsi']?>
             <?=$data['gambar']?>
            <img src="../img/<?php echo $data['gambar'];?>" style="max-width: 250px; max-height: 300px">
        </tr>
         <?php
          $no++;
          }
        ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            
          </div>
        </div>
      </div>
    </div>

    <hr>
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
</div>