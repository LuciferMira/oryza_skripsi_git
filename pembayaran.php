<?php
namespace Midtrans;
// session_start();
require_once 'config/koneksi.php';
require_once 'session.php';
require_once 'item.php';

$cart = unserialize(serialize($_SESSION['cart']));
$idu = $id;
$idbrg = $cart[0]->id;
$jml = $cart[0]->quantity;
$s = 0;
for($i=0; $i<count($cart);$i++) {
  $s += $cart[$i]->price * $cart[$i]->quantity;
}
$total = $s;
$tgl = date('Y-m-d');
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
// Save new orders
$sql1 = "INSERT INTO transaksi VALUES ('','$idu','$idbrg','$jml','$total','$tgl','$nama','$alamat','$telp')";
$exe = mysqli_query($koneksi, $sql1);
  if($exe){
    $search = mysqli_query($koneksi, "SELECT id_pesanan FROM transaksi ORDER BY id_pesanan DESC LIMIT 1");
    $data = mysqli_fetch_array($search);
    $idp = $data['id_pesanan'];
    // Save order details for new orders
    $cart = unserialize(serialize($_SESSION['cart']));
    for($i=0; $i<count($cart);$i++) {
    $idpro = $cart[$i]->id;
    $sathar = intval($cart[$i]->price);
    $qtybel = intval($cart[$i]->quantity);
    $subtotal = intval($cart[$i]->price) * intval($cart[$i]->quantity);
    $sql2 = "INSERT INTO detail_transaksi VALUES ('$idp','$idpro', '$sathar', '$qtybel', '$subtotal')";
    mysqli_query($koneksi, $sql2);
  }
}
// Clear all product in cart
unset($_SESSION['cart']);

require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';
//Set Your server key
Config::$serverKey = "SB-Mid-server-9yJRpPxgIp1Ii_54-vP3g2HO";

// Uncomment for production environment
// Config::$isProduction = true;

// Uncomment to enable sanitization
// Config::$isSanitized = true;

// Uncomment to enable 3D-Secure
// Config::$is3ds = true;

$call = mysqli_query($koneksi,"SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, detail_transaksi.jumlah_beli as qty, subtotal, total, nama_penerima, alamat_penerima, telp_penerima FROM transaksi
        INNER JOIN user ON user.id = transaksi.id_user
        INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
        INNER JOIN produk ON produk.id = detail_transaksi.id_produk WHERE transaksi.id_pesanan = $idp");
$dat = mysqli_fetch_array($call);
// Required
$transaction_details = array(
    'order_id' => $dat['idp'],
    'gross_amount' => intval($dat['total']), // no decimal allowed for creditcard
    // 'gross_amount' => 452, // no decimal allowed for creditcard
);
echo intval($dat['total']);
// echo intval($detail['harga_satuan'])*intval($detail['qty']);

$item_details = array();
$call1 = mysqli_query($koneksi,"SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, detail_transaksi.jumlah_beli as qty, subtotal, total, nama_penerima, alamat_penerima, telp_penerima FROM transaksi
        INNER JOIN user ON user.id = transaksi.id_user
        INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
        INNER JOIN produk ON produk.id = detail_transaksi.id_produk WHERE transaksi.id_pesanan = $idp");
$z = 0;
while($detail = mysqli_fetch_array($call1)){
  echo $detail['harga_satuan']*$detail['qty'];
  $item_details[$z++] = array(
    'id' => $detail['idb'],
    'price' => intval($detail['harga_satuan']),
    'quantity' => intval($detail['qty']),
    'name' => $detail['nama_produk']
  );
}

$namapisah = explode(" ",$dat['nama_pengguna']);
if(count($namapisah)==1){
  $namapisah[1] = " ";
}
// Optional
$billing_address = array(
    'first_name'    => $namapisah[0],
    'last_name'     => $namapisah[1],
    'address'       => $dat['alamat'],
    'city'          => "-",
    'postal_code'   => "-",
    'phone'         => $dat['telepon'],
    'country_code'  => 'IDN'
);

$namapen = explode(" ",$dat['nama_penerima']);
if(count($namapen)==1){
  $namapen[1] = " ";
}
// Optional
$shipping_address = array(
    'first_name'    => $namapen[0],
    'last_name'     => $namapen[1],
    'address'       => $dat['alamat_penerima'],
    'city'          => "-",
    'postal_code'   => "-",
    'phone'         => $dat['telp_penerima'],
    'country_code'  => 'IDN'
);

// Optional
$customer_details = array(
    'first_name'    => $namapisah[0],
    'last_name'     => $namapisah[1],
    'email'         => $dat['email'],
    'phone'         => $dat['telepon'],
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
);

// Fill SNAP API parameter
$params = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

try {
    // Get Snap Payment Page URL
    $paymentUrl = Snap::createTransaction($params)->redirect_url;

    // Redirect to Snap Payment Page
    header('Location: ' . $paymentUrl);
}
catch (Exception $e) {
    echo $e->getMessage();
}
