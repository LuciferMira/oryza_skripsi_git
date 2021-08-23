<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// Start the session
session_start();
require_once 'config/koneksi.php';
require_once 'item.php';

if(isset($_GET['id']) && !isset($_POST['update'])){
	$sql = "SELECT * FROM produk WHERE id=".$_GET['id'];
	$result = mysqli_query($koneksi, $sql);
	$product = mysqli_fetch_object($result);
	$item = new Item();
	$item->id = $product->id;
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
<h2> Items in your cart: </h2>
<form method="POST">
<table id="t01">
<tr>
	<th>Option</th>
	<th>Id</th>
	<th>Name</th>
	<th>Price</th>
	<th>Quantity</th>

	<th>Total</th>
</tr>
<?php
     $cart = unserialize(serialize($_SESSION['cart']));
 	 $s = 0;
 	 $index = 0;
 	for($i=0; $i<count($cart); $i++){
 		$s += $cart[$i]->price * $cart[$i]->quantity;
 ?>
   <tr>
    	<td><a href="cart2.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')" >Delete</a> </td>
   		<td> <?php echo $cart[$i]->id; ?> </td>
   		<td> <?php echo $cart[$i]->name; ?> </td>
   		<td>Rp. <?php echo $cart[$i]->price; ?> </td>
        <td> <input type="number" min="1" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]"> </td>
        <td> Rp.<?php echo $cart[$i]->price * $cart[$i]->quantity; ?> </td>
   </tr>
 	<?php
	 	$index++;
 	} ?>
 	<tr>
 		<td colspan="5" style="text-align:right; font-weight:bold">Sum
         <input id="saveimg" type="image" src="images/save.png" name="update" alt="Save Button">
         <input type="hidden" name="update">
 		</td>
 		<td> Rp.<?php echo $s; ?> </td>
 	</tr>
</table>
</form>
<br>
<a href="index.php">Continue Shopping</a> | <a href="checkout.php">Checkout</a>
<?php
if(isset($_GET["id"]) || isset($_GET["index"])){
 header('Location: cart2.php');
}
?>
</body>
 </html>
