<?php require_once("head.php");

         
    require_once('../config/koneksi.php');
    if(isset($_GET['id'])){
      
    $edit=$_GET['id'];
    $query =mysqli_query($koneksi, "SELECT * from riwayat where id_transaksi='$edit'");
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
                                    <li class="active">Data Riwayat Belanja</li>
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
                                        <h4 class="card-title">Data Riwayat Belanja </h4>
                                    </div>
                            
                                    
                                </div>
 



 <div class="form-group">
        <div>
         <label for="exampleInputEmail1">Id Transaksi</label>
          <input value="<?=$data['id_transaksi']?>" type="text" name="id_transaksi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Tanggal</label>
          <input value="<?php echo $data['tanggal']?>" type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Nama Produk</label>
          <input value="<?=$data['nama_produk']?>"" type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Jumlah</label>
          <input value="<?=$data['jumlah']?>""type="text" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Harga</label>
          <input value="<?=$data['harga']?>"type="text" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
       <div class="form-group">
          <label for="exampleInputEmail1">Status Bayar</label>
          <input value="<?=$data['status_bayar']?>"type="text" name="status_bayar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
          <div class="modal-footer">
            <a href="datauser.php" class="btn btn-secondary" data-dismiss="modal">Keluar</a>
            <!-- <a href="datauser.php" class="btn btn-primary" data-dismiss="modal">Simpan</a> -->
          </div>
             </form>     
<?php require_once("footer.php"); ?>   