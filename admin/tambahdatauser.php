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
                                    <li class="active">Data User</li>
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
                                <strong>Tambah Data User</strong> <small> Small Text Mask</small>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Pengguna</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-female"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 99/99/9999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                        <input class="form-control" type="email">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. (999) 999-9999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Tempat Lahir</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                        <input class="form-control" type="text">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 99-9999999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Tanggal Lahir</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="date">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Alamat</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. ~9.99 ~9.99 999</small> -->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Telepon</label>
                                   <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <!-- <small class="form-text text-muted">ex. 9999 9999 9999 9999</small> -->
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="datauser.php" class="btn btn-warning" style="color: white;"><i class="fa fa-times"></i> Kembali</a>
                                <a href="datauser.php" class="btn btn-primary" style="color: white;"><i class="fa fa-check"></i> Simpan</a>


                            </div>
                        </div>
                    </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>   