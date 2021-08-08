<?php require_once('head1.php'); 
if(isset($_POST['btn_simpan'])){
  $idlama = mysqli_query($koneksi, "select id_barang from barang order by id_barang desc limit 1");
  $dataid = mysqli_fetch_array($idlama);
  $pisah = substr($dataid['id_barang'],3);
  $angka = intval($pisah)+1;
  $idbaru ="" ;
  if($angka<=9){
    $idbaru = "brg00".$angka;
  }elseif($angka<=99){
    $idbaru = "brg0".$angka;
  }else{
    $idbaru = "brg".$angka;
  }
  $barang = $_POST['nama_barang'];
  $harga = $_POST['harga'];
  $berat = $_POST['berat_satuan'];
  $stok = $_POST['stok'];
  $deskripsi = $_POST['deskripsi'];
  $gambar = $_FILES['gambar']['name'];
  $ukuran = $_FILES['gambar']['size'];
  $tempat= $_FILES['gambar']['tmp_name'];
  $ektensi=array('png','jpg','jpeg');
  $get= strtolower(end(explode('.', $gambar)));

  if(in_array($get,$ektensi) === true){
    if($ukuran < 5044070){
      move_uploaded_file($tempat,'../img/'.$gambar);
      $query =mysqli_query($koneksi,"INSERT INTO barang VALUES('$idbaru','$barang','$harga','$berat','$stok','$deskripsi','$gambar')");
        if($query){
          // header('location:produk2.php?status=input_berhasil');
          echo "<script>window.location('produk2.php?status=input_berhasil');</script>";
        }else{
          header('location:produk2.php?status=input_gagal');
        }

        }else{
          header('location:produk2.php?status=file_terlalu_besar');

        }
    }else{
       header('location:produk2.php?status=file_tidak_sesuai');
    }
  }

  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- <a href="" class="btn btn-success">Tambah</a> -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama barang</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="masukkan nama barang" name="nama_barang">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="masukkan harga" name="harga">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat satuan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="masukkan berat satuan" name="berat_satuan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="masukkan stok"
                    name="stok">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="masukkan deskripsi"name="deskripsi">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gambar</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" placeholder="masukkan gambar"
                    name="gambar">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">Berat satuan</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Stok</span>
                      </div>
                    </div>
                  </div> -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"name="btn_simpan">Kirim</button>
                </div>
              </form>              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once('footer2.php'); ?>