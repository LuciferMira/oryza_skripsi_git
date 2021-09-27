<?php
require_once('../config/koneksi.php');
$tgl = date('d-m-Y');
$query = mysqli_query($koneksi,"SELECT * FROM user WHERE akses='user' ORDER BY nama_pengguna");

require_once('assets/pdf/fpdf.php');
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->SetTitle('LAPORAN DATA USER');
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,0,'Laporan Data User', 0, 2, 'L');

$pdf->SetFont('Arial','B','16');
$pdf->Cell(20,20,'Pabrik Oryza ', 0, 1, 'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,'No',1,0);
$pdf->Cell(30,10,'Nama',1,0);
$pdf->Cell(50,10,'Email',1,0);
$pdf->Cell(40,10,'Tempat Lahir',1,0);
$pdf->Cell(70,10,'Alamat',1,0);
$pdf->Cell(40,10,'No. Telp',1,1);

$pdf->SetFont('Arial','B',10);
$no = 1;
//$data = mysqli_query($con,"SELECT * FROM tbl_pasien ORDER BY id_pasien");
while($d = mysqli_fetch_array($query)){
  $pdf->Cell(10,10,$no++,1,0);
  $pdf->Cell(30,10,$d['nama_pengguna'],1,0);
  $pdf->Cell(50,10,$d['email'],1,0);
  $pdf->Cell(40,10,$d['tempat_lahir'],1,0);
  $pdf->Cell(70,10,$d['alamat'],1,0);
  $pdf->Cell(40,10,$d['telepon'],1,1);
}

$pdf->Output("DataUser - Oryza - ".$tgl.".pdf","D");
?>
