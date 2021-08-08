<?php require_once("head.php"); ?>
        <!-- Header-->

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
                                    <li class="active">Edit Data Transaksi</li>
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
                                        <h4 class="card-title">Edit Data Transaksi</h4>
                                    </div>
                            
                                    
                                </div>
 


<div class="form-group">
          <label for="exampleInputEmail1">ID PESANAN</label>
          <input value="<?=$data['id_pesanan']?>" type="text" name="id_pesanan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">ID PRODUK</label>
          <input value="<?=$data['id_barang']?>" type="text" name="id_barang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">Nama Konsumen</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Beli</label>
          <input value="<?=$data['jumlah']?>" type="number" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
       <div class="form-group">
          <label for="exampleInputEmail1">Total Bayar</label>
          <input value="<?=$data['total_bayar']?>"type="number" name="total_bayar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
         <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <textarea class="form-control" name="alamat"><?=$data['alamat']?></textarea>
              </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Telepon</label>
          <input value="<?=$data['telepon']?>"type="number" name="telepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
      
          <div class="modal-footer">
            <a href="datatransaksi.php" class="btn btn-secondary" data-dismiss="modal">Keluar</a>
            <a href="datatransaksi.php" class="btn btn-primary" data-dismiss="modal">Simpan</a>
          </div>
             </form>     
<?php require_once("footer.php"); ?>   