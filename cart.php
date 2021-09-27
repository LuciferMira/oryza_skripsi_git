<?php require_once("head.php");
session_start();
require_once("item.php");
if(isset($_GET['id']) && !isset($_POST['update'])){
	$sql = "SELECT * FROM produk WHERE id=".$_GET['id'];
	$result = mysqli_query($koneksi, $sql);
	$product = mysqli_fetch_object($result);
	$item = new Item();
	$item->id = $product->id;
  $item->pic = $product->gambar;
	$item->name = $product->nama;
	$item->price = $product->harga;
    $iteminstock = $product->stok;
	$item->quantity = 1;
	// Check product is existing in cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
	for($i=0; $i<count($cart);$i++)
		if ($cart[$i]->id == $_GET['id']){
			$index = $i;
			break;
		}
		if($index == -1)
			$_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
		else {

			if (($cart[$index]->quantity) < $iteminstock)
				 $cart[$index]->quantity ++;
			     $_SESSION['cart'] = $cart;
		}
}

// Delete product in cart
if(isset($_GET['index']) && !isset($_POST['update'])) {
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}
// Update quantity in cart
if(isset($_POST['update'])) {
  $arrQuantity = $_POST['quantity'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->quantity = $arrQuantity[$i];
  }
  $_SESSION['cart'] = $cart;
}
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero" style="background-color: #967205;">
        <div class="container">
          <div class="breadcrumb-hero" style="background-color: #967205;">
            <h2>Belanjaanku</h2>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.php">Beranda</a></li>
          <li>Belanjaanku</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

					<form method="POST">
        <div class="row">
          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <table class="table">
                <thead class="table-light">
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
										<th>Subtotal</th>
                    <th>Aksi</th>


                </thead>
                <tbody>
                  <?php
									if(!isset($_SESSION['cart']) || $_SESSION['cart']==null){
										$cart = "";
										$count = 0;
										$s = 0;?>
										<td colspan="7" style="text-align:center;">Tidak ada Data</td>
									<?php }else{
                     $cart = unserialize(serialize($_SESSION['cart']));
                   	 $s = 0;
                   	 $index = 0;
                   	for($i=0; $i<count($cart); $i++){
                   		$s += $cart[$i]->price * $cart[$i]->quantity;
                   ?>
                     <tr>
											 	<td><?= $index+1?></td>
												<td><img src="admin/images/produk/<?= $cart[$i]->pic;?>" alt="Gambar" height="50px" width="100px"> </td>
                     		<td> <?php echo $cart[$i]->name; ?> </td>
                          <td><input type="number" min="1" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]" class="form-control" width="2"></td>
													<td>Rp. <?php echo $cart[$i]->price; ?> </td>
                          <td> Rp.<?php echo $cart[$i]->price * $cart[$i]->quantity; ?> </td>
													<td><a class="btn btn-danger" href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus?')" >Hapus</a></td>
                     </tr>
                   	<?php
                  	 	$index++;
                   	} ?>
                   	<tr>
                   		<td colspan="7" style="text-align:right; font-weight:bold">
                           <input id="saveimg" type="submit" name="update" class="btn btn-warning" value="Simpan">
                           <input type="hidden" name="update">
                   		</td>
											<!-- <td>Total</td> -->
                   		<!-- <td>Rp.<?php echo $s; ?> </td> -->
                   	</tr>
                  </table>
                  </form>
                  <br>
                  <!-- <a href="index.php">Continue Shopping</a> | <a href="checkout.php">Checkout</a> -->
                  <?php
                  if(isset($_GET["id"]) || isset($_GET["index"])){
                   header('Location: cart.php');
								 } }
                  ?>
              </tbody>

              </table>

            </article><!-- End blog entry -->




          </div><!-- End blog entries list -->

          <div class="col-lg-4">
            <div class="sidebar">
              <div class="sidebar-item recent-posts">
              <h3>Ringkasan Belanja</h3>
              <hr>
              <h6>Total Harga : Rp. <?= $s ?>,00</h6>

              <hr>
							<?php if(isset($_SESSION['nama']) && $_SESSION['cart']!=null){?>
              <a href="checkout.php" class="btn btn-warning btn-block">
                        <i class="icofont-bill-alt"> </i> Checkout
              </a>
							<?php }elseif(isset($_SESSION['nama']) && $_SESSION['cart']==null){?>
              <!--<a href="checkout.php" class="btn btn-warning btn-block">-->
                        <!--<i class="icofont-bill-alt"> </i> -->
                        Pilih Barang Terlebih Dahulu
              <!--</a>-->
							<?php }else{ ?>
							<a href="masuk.php" class="btn btn-success btn-block">
                        <i class="icofont-bill-alt"> </i> Masuk
              </a>
							<?php } ?>

              </div><!-- End sidebar recent posts-->
            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

 <?php require_once("footer.php"); ?>
