<?php require_once("head.php");
  if(isset($_POST['btn_simpan'])){
    $gambar = $_FILES['gambar']['name'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $berat = $_POST['berat'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    if($gambar!=null){
      $ekstensi_diperbolehkan	= array('png','jpg');
      $y = explode('.', $gambar);
      $ekstensi = strtolower(end($y));
      $ukuran	= $_FILES['gambar']['size'];
      $file_tmp = $_FILES['gambar']['tmp_name'];
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
  				if($ukuran < 1044070){ //10MB
  					move_uploaded_file($file_tmp, 'images/produk/'.$gambar);
            $up = mysqli_query($koneksi, "INSERT INTO produk SET gambar = '$gambar', nama = '$nama', harga ='$harga', berat ='$berat', stok ='$stok', deskripsi ='$deskripsi', kategori ='$kategori'");
  					if($up){
  						header('location:dataproduk.php?stat=input_berhasil');
  					}else{
  						header('location:dataproduk.php?stat=input_gambar_gagal');
  					}
  				}else{
  					header('location:dataproduk.php?stat=ukuran_file_terlalu_besar');
  				}
  			}else{
  				header('location:dataproduk.php?stat=file_gambar_tidak_sesuai');
  			}
  		}else{
      $up = mysqli_query($koneksi, "INSERT INTO produk SET nama = '$nama', harga ='$harga', berat ='$berat', stok ='$stok', deskripsi ='$deskripsi', kategori ='$kategori'");
        if($up){
          header('location:dataproduk.php?stat=input_berhasil');
        }
        else{
        header('location:dataproduk.php?stat=input_gagal');
        }
    }
  }
?>

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
                                    <li class="active">Tambah Data Produk</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="animated fadeIn">

         <div class="col-xs-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Tambah Data Produk</strong>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Gambar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-picture-o"></i></div>
                                        <input class="form-control" type="file" name="gambar">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 99/99/9999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Nama</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input class="form-control" type="text" name="nama">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. (999) 999-9999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                                        <input class="form-control" type="number" name="harga">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 99-9999999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Berat</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="number" name="berat">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                                </div>
                               <div class="form-group">
                                    <label class=" form-control-label">Stok</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bookmark"></i></div>
                                        <input class="form-control" type="number" name="stok">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. ~9.99 ~9.99 999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Deskripsi</label>
                                   <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bars"></i></div>
                                        <textarea class="form-control" placeholder="Isi kan deskripsi barang disini" id="floatingTextarea" name="deskripsi"></textarea>
                                    </div>
                                </div>
                                     <div class="form-group">
                                    <label class=" form-control-label">Kategori</label>
                                   <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-check-square"></i></div>
                                        <!-- <input class="form-control" type="text" name="kategori"> -->
                                        <select class="form-control" name="kategori">
                                          <option value="beras">Beras</option>
                                          <option value="dedak">Dedak</option>
                                        </select>
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 9999 9999 9999 9999</small> -->
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="dataproduk.php" class="btn btn-warning" style="color: white;"><i class="fa fa-times"></i> Kembali</a>
                                <input type="submit" name="btn_simpan" value="Simpan" class="btn btn-primary">
                            </div>
                    </form>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>
