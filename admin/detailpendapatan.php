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
                                    <li class="active">Detail Pendapatan</li>
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
                                        <h4 class="card-title">Detail Pendapatan</h4>
                                    </div>
                            
                                    
                                </div>
 



 <div class="form-group">
          <label for="exampleInputEmail1">ID Barang</label>
          <input value="<?=$data['id_barang']?>"  type="text" name="barang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal</label>
          <input value="<?php echo $data['tanggal']?>" type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Barang</label>
          <input value="<?=$data['nama_barang']?>"type="text" name="barang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Jumlah</label>
          <input value="<?=$data['jumlah']?>"type="number" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Harga</label>
          <input value="<?=$data['harga']?>"type="number" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Total Pemasukan</label>
          <input value="<?=$data['total_pemasukan']?>"type="number" name="total_pemasukan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
          <div class="modal-footer">
            <a href="datapendapatan.php" class="btn btn-secondary" data-dismiss="modal">Keluar</a>
            <a href="datapendapatan.php" class="btn btn-primary" data-dismiss="modal">Simpan</a>
          </div>
             </form>     
<?php require_once("footer.php"); ?>   