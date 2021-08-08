<?php require_once("head.php");
        // <!-- Header-->
    require_once('../config/koneksi.php');
    if(isset($_GET['id'])){
      
    $id=$_GET['id'];
    $query =mysqli_query($koneksi, "SELECT * from barang_masuk where id='$id'");
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
                                    <li class="active">Detail Barang Masuk</li>
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
                                        <h4 class="card-title">Data Barang Masuk</h4>
                                    </div>
                            
                                    
                                </div>
 



 <div class="form-group">
          <label for="exampleInputEmail1">ID Barang</label>
          <input value="<?php echo $data['id']?>"  type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Produk</label>
          <input value="<?php echo $data['nama_barang']?>"type="text" name="nama_barang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Masuk</label>
          <input value="<?php echo $data['tanggal_masuk']?>" type="date" name="tanggal_masuk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Berat</label>
          <input value="<?=$data['berat']?>"type="number" name="berat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Jumlah</label>
          <input value="<?=$data['harga']?>"type="number" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
       <div class="form-group">
          <label for="exampleInputEmail1">Harga Satuan</label>
          <input value="<?=$data['harga']?>"type="number" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Total Pembelian</label>
          <input value="<?=$data['total_bayar']?>"type="number" name="Harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div
       
          <div class="modal-footer">
            <a href="databarangmasuk.php" class="btn btn-secondary" data-dismiss="modal">Keluar</a>
            <!-- <a href="databarangmasuk.php" class="btn btn-primary" data-dismiss="modal">Simpan</a> -->
          </div>
             </form>     
<?php require_once("footer.php"); ?>   