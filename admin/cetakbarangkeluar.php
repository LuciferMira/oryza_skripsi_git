<?php
require_once('../config/koneksi.php');
$tgl = date('d-m-Y');
$query = mysqli_query($koneksi,"SELECT id_pesanan,barang_keluar.id,produk.nama as nama_produk,barang_keluar.id_produk as id_produk,tanggal_keluar, jumlah FROM barang_keluar
INNER JOIN  produk ON produk.id = barang_keluar.id_produk ORDER BY tanggal_keluar ASC");

require_once('assets/pdf/fpdf.php');
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->SetTitle('LAPORAN DATA BARANG KELUAR');
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,0,'Laporan Data Barang Keluar', 0, 2, 'L');

$pdf->SetFont('Arial','B','16');
$pdf->Cell(20,20,'Pabrik Oryza ', 0, 1, 'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,'No',1,0);
$pdf->Cell(30,10,'Id Pesanan',1,0);
$pdf->Cell(30,10,'Nama Barang',1,0);
$pdf->Cell(50,10,'Tanggal Keluar',1,0);
$pdf->Cell(40,10,'Jumlah/Qty',1,1);

$pdf->SetFont('Arial','B',10);
$no = 1;
//$data = mysqli_query($con,"SELECT * FROM tbl_pasien ORDER BY id_pasien");
while($d = mysqli_fetch_array($query)){
  $pdf->Cell(10,10,$no++,1,0);
  $pdf->Cell(30,10,$d['id_pesanan'],1,0);
  $pdf->Cell(30,10,$d['nama_produk'],1,0);
  $pdf->Cell(50,10,$d['tanggal_keluar'],1,0);
  $pdf->Cell(40,10,$d['jumlah'],1,1);
}

$pdf->Output("DataBarangKeluar - Oryza - ".$tgl.".pdf","D");
// $pdf->Output();
?>
