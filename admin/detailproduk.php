<?php require_once("head.php");
        // <!-- Header-->
require_once('../config/koneksi.php');
    if(isset($_GET['id'])){

    $edit=$_GET['id'];
    $query =mysqli_query($koneksi, "SELECT * from produk where id='$edit'");
    $data =mysqli_fetch_array($query);
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
                                    <li class="active">Detail Data Produk</li>
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
                                        <h4 class="card-title">Detail Data Produk</h4>
                                    </div>


                                </div>



        <div class="form-group">
                <!-- <label for="exampleInputEmail1">Gambar</label> -->
                <img src="images/produk/<?= $data['gambar']?>" alt="" style="width:500px;height:250px;">
                <!-- <input type="file" name="gambar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['gambar'];?>"> -->
              </div>
        <div class="form-group">
                <label for="exampleInputEmail1">Nama Produk</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$data['nama'];?>" readonly>
              </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Harga</label>
          <input value="<?=$data['harga'];?>"type="number" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Berat</label>
          <input value="<?=$data['berat'];?>" type="number" name="berat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
       <div class="form-group">
                <label for="exampleInputEmail1">Stok</label>
                <input type="number" name="stok" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$data['stok']?>" readonly>
              </div>
         <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <textarea type="text" name="deskripsi" class="form-control" value="" readonly><?= $data['deskripsi']?></textarea>
              </div>
         <div class="form-group">
                <label for="exampleInputEmail1">Kategori</label>
                <textarea type="text" name="kategori" class="form-control" value="" readonly><?= $data['kategori']?></textarea>
              </div>
          <div class="modal-footer">
            <a href="dataproduk.php" class="btn btn-secondary" data-dismiss="modal">Keluar</a>
            <!-- <a href="dataproduk.php" class="btn btn-primary" data-dismiss="modal">Simpan</a> -->
          </div>
             </form>
           </div>
           </div>
<?php require_once("footer.php"); ?>
