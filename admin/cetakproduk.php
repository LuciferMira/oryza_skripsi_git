<?php
require_once('../config/koneksi.php');
$tgl = date('d-m-Y');
$query = mysqli_query($koneksi,"SELECT * FROM produk ORDER BY nama");

require_once('assets/pdf/fpdf.php');
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->SetTitle('LAPORAN DATA PRODUK');
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,0,'Laporan Data Produk', 0, 2, 'L');

$pdf->SetFont('Arial','B','16');
$pdf->Cell(20,20,'Pabrik Oryza ', 0, 1, 'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,'No',1,0);
$pdf->Cell(40,10,'Nama',1,0);
$pdf->Cell(50,10,'Foto',1,0);
$pdf->Cell(40,10,'Harga',1,0);
$pdf->Cell(20,10,'Berat',1,0);
$pdf->Cell(20,10,'Stok',1,0);
$pdf->Cell(40,10,'Kategori',1,1);

$pdf->SetFont('Arial','B',10);
$no = 1;
//$data = mysqli_query($con,"SELECT * FROM tbl_pasien ORDER BY id_pasien");
while($d = mysqli_fetch_array($query)){
  $pdf->Cell(10,30,$no++,1,0);
  $pdf->Cell(40,30,$d['nama'],1,0);
  $pdf->Cell(50,20,$pdf->Image("images/produk/".$d['gambar'], $pdf->GetX(), $pdf->GetY(), 33.78),1,0);
  $pdf->Cell(40,30,$d['harga'],1,0);
  $pdf->Cell(20,30,$d['berat'],1,0);
  $pdf->Cell(20,30,$d['stok'],1,0);
  $pdf->Cell(40,30,$d['kategori'],1,1);
}

$pdf->Output("DataProduk - Oryza - ".$tgl.".pdf","D");
// $pdf->Output();
?>
