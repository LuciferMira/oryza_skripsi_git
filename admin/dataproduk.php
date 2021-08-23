<?php require_once("head.php");
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
                                    <li class="active">Data Produk</li>
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
                                        <h4 class="card-title">Data Produk</h4>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="tambahdataproduk.php"class="btn btn-primary btn-block" style="color: white;"><i class="fa fa-plus"></i> Tambah Data</a>
                                    </div>
                                    <div class="col-lg-2">
                                         <a href="cetakproduk.php" class="btn btn-success btn-block " style="color: white;"><i class="fa fa-print"></i> Cetak</a>
                                    </div>

                                </div>

                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <th class="serial">Id</th>
                                            <th class="avatar">Gambar</th>
                                            <th class="#">Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Berat</th>
                                            <th>Stok</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $no=1;
                                          $tampil = mysqli_query($koneksi, " SELECT * from produk");
                                          while($data = mysqli_fetch_array($tampil)) {
                                          ?>

                                        <tr>
                                            <td class="serial"><?= $no++ ?></td>
                                            <td>  <span class="name"><?= $data['id'] ?></span> </td>
                                             <td class="avatar">
                                                <!-- <div class="round-img"> -->
                                                    <img src="images/produk/<?= $data['gambar']?>" alt="" style="width:500px;height:50px;">
                                                <!-- </div> -->
                                            </td>
                                            <td>  <span class="name"><?=$data['nama'];?></span>
                                            <td><span class="count"><?=$data['harga'];?></span></td>
                                            <td> <span class="product"><?=$data['berat'];?></span> </td>
                                            <td><span class="count"><?=$data['stok'];?></span></td>
                                            <td> <span class="deskripsi"><?=$data['deskripsi'];?></span> </td>
                                            <td> <span class="kategori"><?=$data['kategori'];?></span> </td>


                                            <td>
              <a href="detailproduk.php?id=<?=$data['id'];?>" class="badge badge-pending"><i class="fa fa-list"></i> Detail</a>
              <a href="editproduk.php?id=<?=$data['id'];?>" class="badge badge-warning"><i class="fa fa-edit"></i> Edit</a>
              <a href="dltproduk.php?id=<?=$data['id'];?>" class="badge badge-danger"><i class="fa fa-trash"></i> Hapus</a>
            </td>
                                            </td>
                                        </tr>



                                        </tr>
                                    </tbody>
                                     <?php
                                        }
                                        ?>
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
                        <!-- <div class="card-header">
                            <strong class="card-title">Stripped Table</strong>
                        </div> -->

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<?php require_once("footer.php"); ?>
