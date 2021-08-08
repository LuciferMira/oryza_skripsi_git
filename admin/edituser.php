<?php require_once("head.php");
        // <!-- Header-->

        require_once('../config/koneksi.php');
  if(isset($_GET['id'])){
  $edit=$_GET['id'];
  $query =mysqli_query($koneksi, " SELECT * from user where id='$edit' ");
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
                                    <li class="active">Edit User</li>
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
                                        <h4 class="card-title">Edit Data User</h4>
                                    </div>
                            
                                    
                                </div>
 



 <div class="form-group">
          <label for="exampleInputEmail1">Nama Lengkap</label>
          <input value="<?=$data['nama_lengkap']?>"  type="text" name="nama_lengkap" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tempat Lahir</label>
          <input value="<?=$data['tempat_lahir']?>"type="text" name="tempat_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
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
          <label for="exampleInputEmail1">Username</label>
          <input value="<?=$data['username']?>"type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
          <input value="<?=$data['password']?>"type="text" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
          <div class="modal-footer">
            <a href="datauser.php" class="btn btn-secondary" data-dismiss="modal">Keluar</a>
            <a href="datauser.php" class="btn btn-primary" data-dismiss="modal">Simpan</a>
          </div>
             </form>     
]<?php require_once("footer.php"); ?>   