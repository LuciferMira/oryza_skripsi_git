<?php 
require_once("head.php"); 
require_once("../config/koneksi.php");
    
if(isset($_POST['btn_simpan'])){
  $barang = $_POST['nama_barang'];
  $berat = $_POST['berat'];
  $tglmsk = $_POST['tanggal_masuk'];
  $jml = $_POST['jumlah'];
  $harga = $_POST['harga'];
  $total = $_POST['total_bayar'];


  
  
      $query =mysqli_query($koneksi,"INSERT INTO barang_masuk VALUES('$id','$nama_barang','$berat','$tanggal_masuk','$jumlah','$harga','$total')");
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
                                    <li class="active">Barang Masuk</li>
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
                                        <h4 class="card-title">Data Barang Masuk</h4>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="tdmasuk.php" class="btn btn-primary btn-block" style="color: white;"><i class="fa fa-plus"></i> Tambah Data</a>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="cetakmasuk.php" class="btn btn-success btn-block" style="color: white;"><i class="fa fa-print"></i> Cetak</a>
                                    </div>
                                    
                                </div>

                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <th>Id Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Berat</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satua</th>
                                            <th>Total Pembelian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $no = 1;
                                            $call = mysqli_query($koneksi, "SELECT * FROM barang_masuk ORDER BY id");
                                            $row = mysqli_num_rows($call);
                                            if($row>0){
                                                while($data = mysqli_fetch_array($call)){

                                                
                                        ?>
                                        <tr>
                                            <td class="serial">1.</td>
                                            <td> #5469 </td>
                                            <td><span class="name"><?php echo $data['nama_barang']?></span> </td>
                                            <td><span class="product" type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"><?php echo $data['tanggal_masuk']?></span> </td>
                                            <td><span class="count"><?php echo $data['berat']?></span></td>
                                            <td><span class="count"><?php echo $data['jumlah']?></span></td>
                                            <td><span class="count"><?php echo $data['harga']?></span></td>
                                            <td><span class="count"><?php echo $data['total_bayar']?></span></td>
                                            <td>
                                              <a href="detailmasuk.php?id=<?php echo $data['id']; ?>" class="badge badge-pending"><i class="fas fa-list"></i>Detail</a>
                                              <a href="editmasuk.php?id=<?php echo $data['id']; ?>" class="badge badge-warning"><i class="fas fa-edit"></i>Edit</a>
                                              <a href="dltbarangmasuk.php?id=<?=$data['id'];?>" class="badge badge-danger"><i class="fas fa-trash"></i>Hapus</a>
                                            </td>
                                        </tr>
                                        <?php }}else{ ?>
                                        <tr>
                                            <td><span class="count">Tidak Ada Data</span> </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>
                                  
                            </table>
                        </div>
                    </div>
                </div>

                       
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); 
?>   