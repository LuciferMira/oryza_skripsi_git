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
                                    <li class="active">Data Pengeluaran Perbulan</li>
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
                                    <div class="col-lg-8">
                                        <h4 class="card-title">Data Pengeluaran Mingguan</h4>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="btn-group">
                                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary btn-block">
                                                <i class="fa fa-usd"></i> Pengeluaran</button>
                                            <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                                <button type="button" tabindex="0" class="dropdown-item">Perbulan</button><button type="button" tabindex="0" class="dropdown-item">Perminggu</button>
                                            </div>
                                        </div>
                                        <!-- <a class="btn btn-primary btn-block" style="color: white;"><i class="fa fa-plus"></i> Tambah Data</a> -->
                                    </div>
                                    <div class="col-lg-2">
                                        <a class="btn btn-success btn-block" style="color: white;"><i class="fa fa-print"></i> Cetak</a>
                                    </div>
                                    
                                </div>

                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <th>Id Barang</th>
                                            <th>Tanggal Pengeluaran</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Jumlah Karung</th>
                                            <th>harga</th>
                                            <th>Total Pengeluaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="serial">1.</td>
                                            <td> #5469 </td>
                                            <td><span class="date"> </span></td>
                                            <td><span class="name">Louis Stanley</span> </td>
                                            <td><span class="product" type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">>iMax</span> </td>
                                            <td><span class="count">231</span></td>
                                            <td><span class="count">231</span></td>
                                            
                                            <td>
                                              <a href="detailpengeluaran.php" class="badge badge-pending"><i class="fas fa-list"></i>Detail</a>
                                              <a href="editpengeluaran.php" class="badge badge-warning"><i class="fas fa-edit"></i>Edit</a>
                                              <a href="dltbrg.php?id=<?=$data['id_barang'];?>" class="badge badge-danger"><i class="fas fa-trash"></i>Hapus</a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>
                                  
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Stripped Table</strong>
                        </div>
                       
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>   