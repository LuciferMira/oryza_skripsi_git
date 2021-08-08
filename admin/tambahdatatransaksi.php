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
                                <strong>Tambah Data Admin</strong> 
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Gambar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-picture-o"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 99/99/9999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Nama</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input class="form-control" type="email">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. (999) 999-9999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                                        <input class="form-control" type="text">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 99-9999999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Berat</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                                </div>
                               <div class="form-group">
                                    <label class=" form-control-label">Stok</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bookmark"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. ~9.99 ~9.99 999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Deskripsi</label>
                                   <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bars"></i></div>
                                        <input class="form-control">
                                    </div>
                                     <div class="form-group">
                                    <label class=" form-control-label">Kategori</label>
                                   <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-check-square"></i></div>
                                        <input class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="datatransaksi.php" class="badge badge-warning" style="color: white;"><i class="fa fa-plus"></i>Kembali</a>
                                <a href="datatransaksi.php" class="badge badge-primary" style="color: white;"><i class="fa fa-plus"></i>Simpan</a>


                            </div>
                        </div>
                    </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>   