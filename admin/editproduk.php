<?php require_once("head.php");
        // <!-- Header-->
              require_once('../config/koneksi.php');
  if(isset($_GET['id'])){
  $edit=$_GET['id'];
  $query =mysqli_query($koneksi, " SELECT * from produk where id='$edit' ");
  $data =mysqli_fetch_array($query);
    }

    if(isset($_POST['btn_simpan'])){
      $id = $_POST['id'];
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
              $up = mysqli_query($koneksi, "UPDATE produk SET gambar = '$gambar', nama = '$nama', harga ='$harga', berat ='$berat', stok ='$stok', deskripsi ='$deskripsi', kategori ='$kategori'
              WHERE id='$id'");
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
        $up = mysqli_query($koneksi, "UPDATE produk SET nama = '$nama', harga ='$harga', berat ='$berat', stok ='$stok', deskripsi ='$deskripsi', kategori ='$kategori'
        WHERE id='$id'");
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
                                    <li class="active">Edit Data Produk</li>
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
                                        <h4 class="card-title">Edit Data Produk</h4>
                                    </div>


                                </div>


<form method="POST" action="" enctype="multipart/form-data">
<!-- <div class="form-group"> -->
          <!-- <label for="exampleInputEmail1">ID</label> -->
          <input value="<?=$data['id']?>" type="hidden" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <!-- </div> -->
  <div class="form-group">
                <label for="exampleInputEmail1">Foto</label><br>
                <img src="images/produk/<?= $data['gambar']?>" alt="" style="width:500px;height:250px;"><br><br>
                <input type="file" name="gambar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
        <div class="form-group">
                <label for="exampleInputEmail1">Nama Produk</label>
                <input type="text" name="nama" class="form-control" value="<?=$data['nama']?>">
              </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Harga</label>
          <input value="<?=$data['harga']?>"type="number" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Berat</label>
          <input value="<?= $data['berat']; ?>" type="number" name="berat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
       <div class="form-group">
                <label for="exampleInputEmail1">Stok</label>
                <input type="number" name="stok" class="form-control" id="exampleInputEmail1" value="<?=$data['stok']?>">
              </div>
         <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="deskripsi" class="form-control"><?= $data['deskripsi']?></textarea>
              </div>
         <div class="form-group">
                <label for="exampleInputEmail1">Kategori</label>
                <!-- <textarea name="kategori" class="form-control"><?= $data['kategori']?></textarea> -->
                <select class="form-control" name="kategori">
                  <?php if($data['kategori']=='beras'){?>
                    <option value="beras" selected>Beras</option>
                    <option value="dedak">Dedak</option>
                  <?php }else{ ?>
                    <option value="beras">Beras</option>
                    <option value="dedak" selected>Dedak</option>
                  <?php } ?>
                </select>
              </div>

          <div class="modal-footer">
            <a href="dataproduk.php" class="btn btn-secondary" data-dismiss="modal">Keluar</a>
            <input type="submit" class="btn btn-primary" value="Simpan" name="btn_simpan">
          </div>
             </form>
           </div>
           </div>
<?php require_once("footer.php"); ?>
