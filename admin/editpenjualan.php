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
                                    <li class="active">Edit Total Penjualan</li>
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
                                        <h4 class="card-title">Edit Total Penjualan</h4>
                                    </div>
                            
                                    
                                </div>
 



 
 <div class="form-group">
          <label for="exampleInputEmail1">ID Pesanan</label>
          <input value="<?=$data['id_pesanan']?>"  type="text" name="pesan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">ID Barang</label>
          <input value="<?=$data['id_barang']?>"  type="text" name="barang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Nama Konsumen</label>
          <input value="<?=$data['nama_konsumen']?>"  type="text" name="nama_konsumen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Beli</label>
          <input value="<?php echo $data['tanggal_beli']?>" type="date" name="tanggal_beli" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
 <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Beli</label>
          <input value="<?=$data['jumlah']?>" type="number" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
       <div class="form-group">
          <label for="exampleInputEmail1">Total Bayar</label>
          <input value="<?=$data['total_bayar']?>"type="number" name="total_bayar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
          <div class="modal-footer">
            <a href="datajual.php" class="btn btn-secondary" data-dismiss="modal">Keluar</a>
            <a href="datajual.php" class="btn btn-primary" data-dismiss="modal">Simpan</a>
          </div>
             </form>     
<?php require_once("footer.php"); ?>   