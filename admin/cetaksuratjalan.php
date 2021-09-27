<?php
require_once('../config/koneksi.php');
$id = $_POST['idp'];
$tglkel = $_POST['data-keluar'];
$tgl = date('d-m-Y');
$query = mysqli_query($koneksi, "SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, berat, detail_transaksi.jumlah_beli as qty,
       subtotal, total, nama_penerima, alamat_penerima, telp_penerima, tanggal_transaksi, qty_kirim, tanggal_keluar FROM transaksi
        INNER JOIN user ON user.id = transaksi.id_user
        INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
        INNER JOIN produk ON produk.id = detail_transaksi.id_produk
        LEFT JOIN barang_keluar ON transaksi.id_pesanan = barang_keluar.id_pesanan WHERE transaksi.id_pesanan='$id' AND barang_keluar.tanggal_keluar='$tglkel'");
$data = mysqli_fetch_array($query);

require_once('assets/pdf/fpdf.php');
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->SetTitle('SURAT KELUAR BARANG');
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,0,'Surat Keluar Barang', 0, 2, 'L');

$pdf->SetFont('Arial','B','16');
$pdf->Cell(20,20,'Pabrik Oryza ', 0, 1, 'L');

$pdf->SetFont('Arial','B','12');
$pdf->Cell(50,10,'Id Pesanan ', 0, 0, 'L');
$pdf->Cell(100,10,': '.$data['idp'], 0, 1, 'L');
$pdf->Cell(50,10,'Nama Pemesan ', 0, 0, 'L');
$pdf->Cell(100,10,': '.$data['nama_pengguna'], 0, 1, 'L');
$pdf->Cell(50,10,'Nama Penerima ', 0, 0, 'L');
$pdf->Cell(100,10,': '.$data['nama_penerima'], 0, 1, 'L');
$pdf->Cell(50,10,'Alamat Pengiriman ', 0, 0, 'L');
$pdf->Cell(100,10,': '.$data['alamat_penerima'], 0, 1, 'L');
$pdf->Cell(50,10,'Tanggal Kirim ', 0, 0, 'L');
$pdf->Cell(100,10,': '.$data['tanggal_keluar'], 0, 1, 'L');
$pdf->Cell(100,10,'', 0, 1, 'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,10,'No',1,0);
$pdf->Cell(50,10,'Id Barang',1,0);
$pdf->Cell(70,10,'Nama Barang',1,0);
$pdf->Cell(50,10,'Qty',1,0);
$pdf->Cell(50,10,'Berat',1,1);

$pdf->SetFont('Arial','B',10);
$no = 1;
$query1 = mysqli_query($koneksi, "SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, berat, detail_transaksi.jumlah_beli as qty,
       subtotal, total, nama_penerima, alamat_penerima, telp_penerima, tanggal_transaksi, qty_kirim, tanggal_keluar FROM transaksi
        INNER JOIN user ON user.id = transaksi.id_user
        INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
        INNER JOIN produk ON produk.id = detail_transaksi.id_produk
        LEFT JOIN barang_keluar ON transaksi.id_pesanan = barang_keluar.id_pesanan WHERE transaksi.id_pesanan='$id' AND barang_keluar.tanggal_keluar='$tglkel'");
while($d = mysqli_fetch_array($query1)){
  $pdf->Cell(30,10,$no++,1,0);
  $pdf->Cell(50,10,$d['idb'],1,0);
  $pdf->Cell(70,10,$d['nama_produk'],1,0);
  $pdf->Cell(50,10,$d['qty_kirim'],1,0);
  $pdf->Cell(50,10,$d['berat']." Kg",1,1);
}

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,20,' ', 0, 1, 'L');
$pdf->Cell(140,30,'Penanggung Jawab Pengiriman ', 0, 0, 'C');
$pdf->Cell(140,30,'Pihak Penerima Barang ', 0, 1, 'C');
$pdf->Cell(140,10,'(....................................................) ', 0, 0, 'C');
$pdf->Cell(140,10,'(....................................................) ', 0, 1, 'C');
$pdf->Cell(140,10,'Tanggal:  ', 0, 0, 'C');
$pdf->Cell(140,10,'Tanggal:  ', 0, 1, 'C');

$pdf->Output("SuratJalan - Oryza - ".$tgl.".pdf","D");
// $pdf->Output();
?>
