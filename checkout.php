<?php require_once("head.php");
session_start();
require_once("item.php");

// Save new orders
$barang = $cart[0]->name;
$jml = $cart[0]->quantity;
$total = $s;
$sql1 = "INSERT INTO transaksi(id_user,id_barang,jumlah_beli,total,tanggal_transaksi) VALUES('$id','$barang','$jml','$s',date('Y-m-d'))";
$exe = mysqli_query($koneksi, $sql1);
if($exe){
  
}
// Save order details for new orders
$cart = unserialize(serialize($_SESSION['cart']));
for($i=0; $i<count($cart);$i++) {
$sql2 = 'INSERT INTO oderdetail (productid, orderid, price, quantity) VALUES ('.$cart[$i]->id.', '.$ordersid.', '.$cart[$i]->price.', '.$cart[$i]->quantity.')';
mysqli_query($con, $sql2);
}

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
            <h2>Checkout</h2>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.php">Beranda</a></li>
          <li><a href="detailproduk.php">Detail Produk</a></li>
          <li>Checkout</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

					<form method="POST">
        <div class="row">
          <div class="col-lg-12 entries">
            <article class="entry entry-single">

              <table class="table">
                <tr>
                  <td>ID Pesanan</td>
                  <td> : </td>
                  <td> <?= ?> </td>
                </tr>
                  </table>
                  </form>
                  <br>
                  <!-- <a href="index.php">Continue Shopping</a> | <a href="checkout.php">Checkout</a> -->

              </tbody>

              </table>

            </article><!-- End blog entry -->

            <article class="entry entry-single">

              <table class="table">
                <thead class="table-light">
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
										<th>Subtotal</th>


                </thead>
                <tbody>
                  <?php
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
                          <td>
                            <!-- <input type="number" min="1" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]" class="form-control" width="2"> -->
                            <?php echo $cart[$i]->quantity; ?>
                          </td>
													<td>Rp. <?php echo $cart[$i]->price; ?> </td>
                          <td>Rp.<?php echo $cart[$i]->price * $cart[$i]->quantity; ?> </td>
                     </tr>
                   	<?php
                  	 	$index++;
                   	} ?>
                   	<tr>
                   		<!-- <td colspan="5" style="text-align:right; font-weight:bold">
                           <input id="saveimg" type="submit" name="update" class="btn btn-warning" value="Simpan">
                           <input type="hidden" name="update">
                   		</td> -->
											<td colspan="5" style="text-align:right; font-weight:bold">Total</td>
                   		<td style=" font-weight:bold">Rp.<?php echo $s; ?>,00 </td>
                   	</tr>
                  </table>
                  </form>
                  <br>
                  <!-- <a href="index.php">Continue Shopping</a> | <a href="checkout.php">Checkout</a> -->

              </tbody>

              </table>

            </article><!-- End blog entry -->




          </div><!-- End blog entries list -->

          <!-- <div class="col-lg-4">
            <div class="sidebar">
              <div class="sidebar-item recent-posts">
              <h3>Ringkasan Belanja</h3>
              <hr>
              <h6>Total Harga : Rp. <?= $s ?>,00</h6>

              <hr>
							<?php if(isset($_SESSION['nama'])){?>
              <a href="checkout.php" class="btn btn-warning btn-block">
                        <i class="icofont-bill-alt"> </i> Checkout
              </a>
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
