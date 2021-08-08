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
                                    <li class="active">Data Transaksi</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content">
            <div class="animated fadeIn">

         <div class="col-xs-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Tambah Barang Keluar</strong> 
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">ID</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-picture-o"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 99/99/9999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bars"></i></div>
                                        <input class="form-control" type="text">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 99-9999999</small> -->
                            
                             <div class="form-group">
                                    <label class=" form-control-label">Tanggal Keluar</label>
                                    <div class="input-group"> 
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="date">
                                    </div>
                                   
                                     <div class="form-group">
                                    <label class=" form-control-label">Kategori</label>
                                    <div class="input-group"> 
                                        <div class="input-group-addon"><i class="fa fa-bars"></i></div>
                                        <input class="form-control" type="kategori">
                                    </div>
                                   

                                <div class="form-group">
                                    <label class=" form-control-label">Berat</label>
                                   <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-circle-o-notch"></i></div>
                                        <input class="form-control">
                                    </div>
                                     <div class="form-group">
                                    <label class=" form-control-label">Jumlah</label>
                                   <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-list"></i></div>
                                        <input class="form-control">
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <label class=" form-control-label">Harga</label>
                                    <div class="input-group"> 
                                        <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                                        <input class="form-control">
                                    </div>
                                   

                            </div>
                            <div class="card-footer">
                                <a href="databarangkeluar.php" class="badge badge-warning" style="color: white;"><i class="fa fa-plus"></i>Kembali</a>
                                <a href="databarangkeluar.php" class="badge badge-primary" style="color: white;"><i class="fa fa-plus"></i>Simpan</a>


                            </div>
                        </div>
                    </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>   