<?php require_once("head.php"); 
        // <!-- Header-->
        require_once("../config/koneksi.php");
    if(isset($_POST['btn_simpan'])){
  $barang = $_POST['id_barang'];
  $tgl=$_POST['tanggal'];
  $nama = $_POST['nama_barang'];
  $jumlah = $_POST['jumlah'];
  $harga = $_POST['harga']; 
  $bayar = $_POST['total_pemasukan'];
  
  
  
      $query =mysqli_query($koneksi,"INSERT INTO pendapatan VALUES('$id_barang','$tanggal','$nama_barang','$jumlah',$harga','$total_pemasukan')");
        if($query){
          header('location:user.php?status=input_berhasil');
        }else{
          header('location:user.php?status=input_gagal');
        }

       
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
                                    <li class="active">Data Pendapatan</li>
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
                                        <h4 class="card-title">Data Pendapatan</h4>
                                    </div>
                                    
                                        <!-- <a class="btn btn-primary btn-block" style="color: white;"><i class="fa fa-plus"></i> Tambah Data</a> -->
                                    </div>
                                    <div class="col-lg-2">
                                         <a href="cetakpendapatan.php" class="btn btn-success btn-block " style="color: white;"><i class="fa fa-print"></i> Cetak</a>
                                    </div>
                                    
                                </div>

                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <th>Id Barang</th>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>harga</th>
                                            <th>Total Pemasukan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="serial">1.</td>
                                            <td> #5469 </td>
                                            <td> #5469 </td>
                                            <td><span class="name">Louis Stanley</span> </td>
                                            <td><span class="product" type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">>iMax</span> </td>
                                            <td><span class="count">231</span></td>
                                            <td><span class="count"> </span></td>
                                            

                                            <td>
                                              <a href="detailpendapatan.php" class="badge badge-pending"><i class="fas fa-list"></i>Detail</a>
                                              <a href="editpendapatan.php" class="badge badge-warning"><i class="fas fa-edit"></i>Edit</a>
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