<?php require_once("head.php");
        // <!-- Header-->

    require_once('../config/koneksi.php');
    if(isset($_GET['id'])){
      
    $edit=$_GET['id'];
    $query =mysqli_query($koneksi, "SELECT * from admin where id='$edit'");
    $data =mysqli_fetch_array($query);
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
                                    <li class="active">Detail Admin</li>
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
                                        <h4 class="card-title">Data Admin</h4>
                                    </div>
                            
                                    
                                </div>
 

<div class="form-group">
          <label for="exampleInputEmail1">ID</label>
          <input value="<?php echo $data['id_admin']?>" type="text" name="id_admin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
 <div class="form-group">
                <label for="exampleInputEmail1">Foto</label>
                <input type="file" name="gambar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
 <div class="form-group">
          <label for="exampleInputEmail1">Nama Admin</label>
          <input value="<?php echo $data['nama']?>"" type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input value="<?php echo $data['email']?>"" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tempat Lahir</label>
          <input value="<?php echo $data['tempat_lahir']?>""type="text" name="tempat_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Lahir</label>
          <input value="<?php echo $data['tanggal_lahir']?>" type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <textarea class="form-control" name="alamat" readonly><?=$data['alamat']?></textarea>
              </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Telepon</label>
          <input value="<?=$data['telepon']?>"type="text" name="telepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
 
          <div class="modal-footer">
            <a href="dataadmin.php" class="btn btn-secondary" data-dismiss="modal">Keluar</a>
            <a href="dataadmin.php" class="btn btn-primary" data-dismiss="modal">Simpan</a>
          </div>
             </form>     
]<?php require_once("footer.php"); ?>   