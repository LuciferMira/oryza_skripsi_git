<?php require_once("head.php"); 
         // <!-- Header -->

require_once("../config/koneksi.php");
    if(isset($_POST['btn_simpan'])){
  $pesan = $_POST['id_pesanan'];
  $barang = $_POST['id_barang'];
  $nama = $_POST['nama_konsumen'];
  $tgl=$_POST['tanggal_beli'];
  $beli = $_POST['jumlah_beli'];
  $bayar = $_POST['total_bayar'];
  
  
  
      $query =mysqli_query($koneksi,"INSERT INTO penjualan VALUES('$id_pesanan','$id_barang','$nama_konsumen','$tanggal_beli',$jumlah_beli','$total_bayar')");
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
                                    <li class="active">Total Penjualan</li>
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
                                <strong class="card-title">Total Penjualan</strong>
                            </div>
                            <div class="col-lg-4">
                                         <a href="cetaktotal.php" class="btn btn-success btn-block " style="color: white;"><i class="fa fa-print"></i> Cetak</a>
                                    </div>
                                    
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <th class="#">ID Pesanan</th>
                                            <th class="#">ID Barang</th>
                                            <th>Nama Konsumen</th>
                                            <th>Tanggal Beli</th>
                                            <th>Jumlah Beli</th>
                                            <th>Harga</th>
                                            <th>Total Bayar </th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="serial">1.</td>
                                            <td>  <span class="name">Br001</span> </td>
                                            <td>  <span class="name">001</span> </td>
                                            <td>  <span class="name">Nadia</span> </td>
                                            <td>  <span class="date"></span> </td>
                                            <td> <span class="product">5</span> </td>
                                            <td><span class="count">250000</span></td>
                                            <td>  <span class="count">333</span> </td>
                                            >
                                            <td>
              <a href="detailtotal.php" class="badge badge-pending"><i class="fas fa-list"></i>Detail</a>
              <a href="editpenjualan.php" class="badge badge-warning"><i class="fas fa-edit"></i>Edit</a>
              <a href="dltbrg.php?id=<?=$data['id_barang'];?>" class="badge badge-danger"><i class="fas fa-trash"></i>Hapus</a>
           
                                        
                                           
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

               
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php require_once("footer.php"); ?>   