<?php require_once("head.php"); 
        // <!-- Header-->
     require_once("../config/koneksi.php");
  if(isset($_POST['btn_simpan'])){
$id = $_POST['id'];
$tgl = $_POST['tanggal']; 
$gambar = $_POST['gambar']; 
$nama = $_POST['nama_produk']; 
$jml = $_POST['jumlah']; 
$harga = $_POST['harga']; 
$status = $_POST['status_bayar'];
  
  
  
      $query =mysqli_query($koneksi,"INSERT INTO riwayat VALUES('$id','$tgl','$gambar','$nama','$jml','$harga','$status')");
        if($query){
          header('location:../riwayat.php?status=input_berhasil');
        }else{
          header('location:../riwayat.php?status=input_gagal');
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
                                    <li class="active">Data Riwayat Belanja</li>
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
                                        <h4 class="card-title">Data Riwayat Belanja</h4>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                         <a href="cetakriwayat.php" class="btn btn-success btn-block " style="color: white;"><i class="fa fa-print"></i> Cetak</a>
                                    </div>
                                    
                                </div>

                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <th class="#">Id Transaksi</th>
                                            <th class="#">Tanggal</th>
                                            <th>Gambar</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Alamat</th>
                                            <th>Status Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $call = mysqli_query($koneksi, "SELECT * FROM riwayat ORDER BY id_transaksi");
                                            $row = mysqli_num_rows($call);
                                            if($row>0){
                                                while($data = mysqli_fetch_array($call)){
                                        ?>
                                        <tr>
                                            <td class="serial"><?php echo$no;?></td>
                                            <td><span class="name"><?=$data['id_transaksi'];?></span> </td>
                                            <td><span class="date"><?=$data['tanggal'];?></span> </td>
                                              <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><?=$data['gambar'];?><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                                </div>
                                            </td>
                                            <td><span class="product"><?=$data['nama_produk'];?></span> </td>
                                            <td><span class="count"><?=$data['jumlah'];?></span></td>
                                            <td><span class="name"><?=$data['harga'];?></span> </td>
                                            <td><span class="name"><?=$data['alamat'];?></span> </td>
                                            <td><span class="name"><?=$data['status_bayar'];?></span> </td>
                                            <td>
                                              <a href="detailriwayat.php?id=<?php echo $data['id_transaksi']; ?>" class="badge badge-pending"><i class="fas fa-list"></i>Detail</a>
                                              <!-- <a href="detailriwayat.php" class="badge badge-warning"><i class="fas fa-edit"></i>Edit</a> -->
                                              <a href="dltriwayat.php?id=<?=$data['id_transaksi'];?>" class="badge badge-danger"><i class="fas fa-trash"></i>Hapus</a>
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
<?php require_once("footer.php"); ?>   