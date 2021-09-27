<?php
require_once('../config/koneksi.php');
$tgl = date('d-m-Y');
$query = mysqli_query($koneksi, "SELECT transaksi.id_pesanan as idp, id_user, nama_pengguna, email, alamat, telepon, detail_transaksi.id_produk as idb, produk.nama as nama_produk, harga_satuan, detail_transaksi.jumlah_beli as qty, subtotal, total, nama_penerima, alamat_penerima, telp_penerima, tanggal_transaksi FROM transaksi
        INNER JOIN user ON user.id = transaksi.id_user
        INNER JOIN detail_transaksi ON detail_transaksi.id_pesanan = transaksi.id_pesanan
        INNER JOIN produk ON produk.id = detail_transaksi.id_produk");

require_once('assets/pdf/fpdf.php');
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->SetTitle('LAPORAN DATA TRANSAKSI');
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,0,'Laporan Data Transaksi', 0, 2, 'L');

$pdf->SetFont('Arial','B','16');
$pdf->Cell(20,20,'Pabrik Oryza ', 0, 1, 'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,'No',1,0);
$pdf->Cell(30,10,'Id Transaksi',1,0);
$pdf->Cell(50,10,'Nama Konsumen',1,0);
$pdf->Cell(40,10,'Total Bayar',1,0);
$pdf->Cell(70,10,'Alamat',1,0);
$pdf->Cell(40,10,'Tanggal Transaksi',1,1);

$pdf->SetFont('Arial','B',10);
$no = 1;
//$data = mysqli_query($con,"SELECT * FROM tbl_pasien ORDER BY id_pasien");
while($d = mysqli_fetch_array($query)){
  $pdf->Cell(10,10,$no++,1,0);
  $pdf->Cell(30,10,$d['idp'],1,0);
  $pdf->Cell(50,10,$d['nama_pengguna'],1,0);
  $pdf->Cell(40,10,$d['total'],1,0);
  $pdf->Cell(70,10,$d['alamat_penerima'],1,0);
  $pdf->Cell(40,10,date('d-M-Y',strtotime($d['tanggal_transaksi'])),1,1);
}

// $pdf->Output("DataTransaksi - Oryza - ".$tgl.".pdf","D");
$pdf->Output();
?>
